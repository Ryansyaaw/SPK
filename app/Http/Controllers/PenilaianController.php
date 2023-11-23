<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Http\Requests\PenilaianRequest;
use App\Models\alternatif;
use App\Models\criteria;
use \Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $alternatif = alternatif::all();
        $criteria = criteria::all();
        $penilaian = Penilaian::with(['criteria', 'alternatif'])->get();
        return view('dashboard.penilaian ', compact(['criteria', 'alternatif', 'penilaian']));
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
        // $data = $request->validated();
        // dd('data');
        // penilaian::create($data);
        // return redirect()-> back();
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
        $criteria = criteria::findOrFail($request->id);
        $data = $request->validated();
        $criteria -> update($data);
        return redirect()-> back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penilaian $penilaian)
    {
        //
    }
}
