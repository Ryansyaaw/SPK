<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penilaian;
use App\Models\alternatif;
use App\Models\criteria;

class PerhitunganController extends Controller
{
    public function index()
    {
        $criteria = criteria::all();
        $alternatif = alternatif::all();
        $penilaian = Penilaian::with(['alternatif', 'criteria'])->get();

        $minMax = [];
        $maxXi = [];
        $minXi = [];
        $tij = [];
        $vij = [];

        $desiredDecimalPlaces = 3; // Ganti dengan jumlah desimal yang diinginkan

        foreach ($criteria as $c) {
            foreach ($penilaian as $p) {
                if ($c->id == $p->id_criteria) {
                    $minMax[$c->id][] = $p->nilai;
                }
            }

            // Check if there are values for the current $kriteriaId
            if (!empty($minMax[$c->id])) {
                $values = $minMax[$c->id];
                $maxXi[$c->id] = max($values);
                $minXi[$c->id] = min($values);

                // Initialize $tij and $vij for the current $kriteriaId
                $tij[$c->id] = [];
                $vij[$c->id] = [];

                // Normalisasi and Weighting
                foreach ($values as $value) {
                    // Initialize $normalizedValue correctly using $value
                    $normalizedValue = 0;

                    if ($c->criteria_type == "Benefit") {
                        $normalizedValue = ($maxXi[$c->id] - $minXi[$c->id]) != 0 ? ($value - $minXi[$c->id]) / ($maxXi[$c->id] - $minXi[$c->id]) : 0;
                    } elseif ($c->criteria_type == "Cost") {
                        $normalizedValue = ($maxXi[$c->id] - $minXi[$c->id]) != 0 ? ($maxXi[$c->id] - $value) / ($maxXi[$c->id] - $minXi[$c->id]) : 0;
                    }

                    // Get the criteria weight from the criteria model
                    $criteriaWeight = $c->weight;

                    // Calculate the weighted value
                    $weightedValue = ($criteriaWeight * $normalizedValue) + $criteriaWeight;

                    // Format the normalized value and weighted value with the desired decimal places
                    $formattedNormalizedValue = number_format($normalizedValue, $desiredDecimalPlaces);
                    $formattedWeightedValue = number_format($weightedValue, $desiredDecimalPlaces);

                    $tij[$c->id][] = $formattedNormalizedValue;
                    $vij[$c->id][] = $formattedWeightedValue;
                }
            }
        }

        // dd($tij, $vij);

        // Kirim data ke view
        return view('dashboard.perhitungan', ['normalisasi' => $tij, 'weighted' => $vij, 'criteria' => $criteria, 'alternatif' => $alternatif, 'penilaian' => $penilaian]);
    }


}
