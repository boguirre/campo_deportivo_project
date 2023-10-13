<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use App\Models\ComplejoCampo;
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

        $complejo_deportivo = ComplejoDeportivo::create($request->all() + [
            'estado' => '0'
        ]);

        return redirect()->route('centro.edit', $complejo_deportivo);
    }

    /**
     * Display the specified resource.
     */
    public function show(ComplejoDeportivo $complejo_deportivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplejoDeportivo $complejo_deportivo)
    {
        $campos = Campo::where('estado', '1')->get();
        return view('centros-deportivos.edit', compact('complejo_deportivo', 'campos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComplejoDeportivo $complejo_deportivo)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horario' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $complejo_deportivo->update($request->all());

        return redirect()->route('centro.edit', $complejo_deportivo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplejoDeportivo $complejo_deportivo)
    {
        //
    }

    public function uploadImagesComplejos(Request $request)
    {
        $uploadedImage = $request->file('file');
        $complejo_deportivo = ComplejoDeportivo::find($request['complejo_id']);

        if ($uploadedImage) {
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->storeAs('public/complejosDeportivos', $imageName); // Almacenar en la carpeta 'images' dentro de la carpeta de almacenamiento

            // Crear una nueva entrada en la base de datos
            $image = new ImagenesComplejo();
            $image->url = 'complejosDeportivos/' . $imageName; // Ruta de la imagen almacenada
            // $image->campo_id = $request->input('campo_id');
            $image->complejo_deportivo_id = $request['complejo_id'];
            $image->save();


            $complejo_deportivo->estado = '1';
            $complejo_deportivo->save();
        }

        // return response()->json(['success' => 'Image uploaded successfully']);
        return redirect()->route('centro.edit', $complejo_deportivo);
    }

    public function deleteImagesComplejos(Request $request)
    {
        $imagen = ImagenesComplejo::find($request['image_id']);
        $complejo_deportivo = ComplejoDeportivo::find($request['complejo_id']);

        $imagen->delete();

        return redirect()->route('centro.edit', $complejo_deportivo);
    }

    public function addCampos(Request $request)
    {
        $selectedCampos = $request->input('mi_select', []);// Obtén las opciones seleccionadas como un array
        $complejo_deportivo = ComplejoDeportivo::find($request['complejo_id']);

        // Itera sobre las opciones seleccionadas y guárdalas en la base de datos
        foreach ($selectedCampos as $campoId) {
            // Guarda la opción en tu modelo Campo
            $complejoCampo = new ComplejoCampo();
            $complejoCampo->campo_id = $campoId;
            $complejoCampo->complejo_deportivo_id = $complejo_deportivo->id;
            $complejoCampo->estado = '1';
            $complejoCampo->save();

            $campo = Campo::find($campoId);
            $campo->estado = '2';
            $campo->save();
        }

        return redirect()->route('centro.edit', $complejo_deportivo);
    }
}
