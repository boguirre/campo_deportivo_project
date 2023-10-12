<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\ImagenesCampo;
use App\Models\TipoCampo;
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
        $tipo_campos = TipoCampo::pluck('nombre', 'id');
        return view('campos.create', compact('tipo_campos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horario' => 'required',
            'precio' => 'required',
            'tipo_campo_id' => 'required',
            'capacidad' => 'required'
        ]);

        $campo = Campo::create($request->all() + [
            'estado' => '0'
        ]);

        return redirect()->route('campo.edit', $campo);
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
        $tipo_campos = TipoCampo::pluck('nombre', 'id');
        return view('campos.edit', compact('campo', 'tipo_campos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campo $campo)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horario' => 'required',
            'precio' => 'required',
            'tipo_campo_id' => 'required',
            'capacidad' => 'required'
        ]);
        
        $campo->update($request->all());

        return redirect()->route('campo.edit', $campo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        //
    }

    public function uploadImages(Request $request)
    {
        $uploadedImage = $request->file('file'); // 'file' es el nombre del campo de entrada en el formulario

        if ($uploadedImage) {
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->storeAs('public/images', $imageName); // Almacenar en la carpeta 'images' dentro de la carpeta de almacenamiento

            // Crear una nueva entrada en la base de datos
            $image = new ImagenesCampo();
            $image->url = 'images/' . $imageName; // Ruta de la imagen almacenada
            // $image->campo_id = $request->input('campo_id');
            $image->campo_id = $request['campo_id'];
            $image->save();

            $campo = Campo::find($request['campo_id']);
            $campo->estado = '1';
            $campo->save();
        }

        // return response()->json(['success' => 'Image uploaded successfully']);
        return redirect()->route('campo.index');
    }
}
