<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('Profesores.index', compact('profesores'));

        //alternativas a compact
        //return view('Profesores.index')->with('Profesores', $Profesores);
        //return view('Profesores.index', ['Profesores' => $Profesores]);
    }

    public function create()
    {
        return view('Profesores.create');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required|string|min:5|max:255',
            'apellidos' => 'required|string|min:5|max:255',
            'estado' => 'required|string|min:5|max:255',
            'idiomas' => 'required|string|min:5|max:255',
            'paises' => 'required|string|min:5|max:255',
            'sbulengua' => 'required|string|min:5|max:255',
        ]);

        // Crear un nuevo estudiante usando el método `create` del modelo
        Profesores::create($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('Profesores.index');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('Profesores.edit', compact('Profesor'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required|string|min:5|max:255',
            'apellidos' => 'required|string|min:5|max:255',
            'estado' => 'required|string|min:5|max:255',
            'idiomas' => 'required|string|min:5|max:255',
            'paises' => 'required|string|min:5|max:255',
            'sbulengua' => 'required|string|min:5|max:255',
        ]);

        // Buscar el estudiante por su ID
        $profesor = Profesor::findOrFail($id);

        // Actualizar los datos del estudiante
        $profesor->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('profesor.index');
    }

    public function destroy(string $id)
    {
        $student = Profesor::findOrFail($id);

        $student->delete();

        return redirect()->route('Profesores.index');
    }
}
