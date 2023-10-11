<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CamposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Campo::paginate(10);

        return view('campos.index', compact('campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campos.create');
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
    public function show(Campo $campo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campo $campo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campo $campo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        //
    }
}
