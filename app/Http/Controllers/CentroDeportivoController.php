<?php

namespace App\Http\Controllers;

use App\Models\ComplejoDeportivo;
use App\Models\ImagenesComplejo;
use Illuminate\Http\Request;

class CentroDeportivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complejoDeportivos = ComplejoDeportivo::paginate(10);

        return view('centros-deportivos.index', compact('complejoDeportivos'));
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
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horario' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $complejo = ComplejoDeportivo::create($request->all() + [
            'estado' => '0'
        ]);

        return redirect()->route('centro.edit', $complejo);
    }

    /**
     * Display the specified resource.
     */
    public function show(ComplejoDeportivo $complejo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplejoDeportivo $complejo)
    {
        return view('centros-deportivos.edit', compact('complejo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComplejoDeportivo $complejo)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horario' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $complejo->update($request->all());

        return redirect()->route('centro.edit', $complejo);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplejoDeportivo $complejo)
    {
        //
    }

    public function uploadImagesComplejos(Request $request)
    {
        $uploadedImage = $request->file('file'); // 'file' es el nombre del campo de entrada en el formulario

        if ($uploadedImage) {
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->storeAs('complejosDeportivos', $imageName); // Almacenar en la carpeta 'images' dentro de la carpeta de almacenamiento

            // Crear una nueva entrada en la base de datos
            $image = new ImagenesComplejo();
            $image->url = 'complejosDeportivos/' . $imageName; // Ruta de la imagen almacenada
            // $image->campo_id = $request->input('campo_id');
            $image->complejo_id = $request['complejo_id'];
            $image->save();

            $complejo = ComplejoDeportivo::find($request['complejo_id']);
            $complejo->estado = '1';
            $complejo->save();
        }

        // return response()->json(['success' => 'Image uploaded successfully']);
        return redirect()->route('centro.index');
    }
}
