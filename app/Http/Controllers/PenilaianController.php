<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Http\Requests\PenilaianRequest;
use App\Models\alternatif;
use App\Models\criteria;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $join = DB::table('penilaians')
        // ->join('alternatifs', 'penilaians.id_alternatif', '=', 'alternatifs.id')
        // ->join('criterias', 'penilaians.id_criteria', '=', 'criterias.id')
        // ->where('penilaians.id_alternatif', '=', $id_alternatif)
        // ->select('penilaians.*', 'alternatifs.*', 'criterias.*')
        // ->get();
        $alternatif = alternatif::all();
        $criteria = criteria::all();
        $penilaian = penilaian::all();
        return view('dashboard.penilaian ', compact(['criteria', 'alternatif', 'penilaian', 'join']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenilaianRequest $request)
    {
        $data = $request->validated();
        dd('data');
        penilaian::create($data);
        return redirect()-> back();
    }

    /**
     * Display the specified resource.
     */
    public function show(penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepenilaianRequest $request, penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penilaian $penilaian)
    {
        //
    }
}
