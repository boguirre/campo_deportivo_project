<?php

namespace App\Http\Controllers;

use App\Models\ComplejoDeportivo;
use Illuminate\Http\Request;

class CentroDeportivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centros = ComplejoDeportivo::paginate(10);

        return view('centros-deportivos.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centros-deportivos.create');
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
    public function show(ComplejoDeportivo $complejoDeportivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplejoDeportivo $complejoDeportivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComplejoDeportivo $complejoDeportivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplejoDeportivo $complejoDeportivo)
    {
        //
    }
}
