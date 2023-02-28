<?php

namespace App\Http\Controllers;

use App\DataTables\MasterPegawaiDataTable;
use App\Models\MasterPegawai;
use Illuminate\Http\Request;

class MasterPegawaiController extends Controller
{
    /**
     * Display a listing of the resource from datatable.
     * @param \App\DataTables\MasterPegawaiDataTable $datatable
     */
    public function index(MasterPegawaiDataTable $datatable)
    {
        return $datatable->render('master-data.master-pegawai');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterPegawai $masterPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterPegawai $masterPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterPegawai $masterPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterPegawai $masterPegawai)
    {
        //
    }
}
