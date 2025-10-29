<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Faculty;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::with('faculty')->get();
        return view('career.index', compact('careers'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('career.new', compact('faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_career' => 'required|min:3',
            'code_career' => 'required|unique:careers,code',
            'faculty_id_career' => 'required|exists:faculties,id',
            'duration_years_career' => 'required|integer|min:1|max:10',
            'level_career' => 'required',
            'degree_awarded_career' => 'required|min:3',
            'status_career' => 'required|in:activo,inactivo'
        ]);

        $datos = [
            'name' => $request->name_career,
            'code' => $request->code_career,
            'faculty_id' => $request->faculty_id_career,
            'duration_years' => $request->duration_years_career,
            'level' => $request->level_career,
            'degree_awarded' => $request->degree_awarded_career,
            'status' => $request->status_career
        ];

        Career::create($datos);

        return redirect()->route('career.index')->with('success', 'Carrera registrada exitosamente.');
    }

    public function edit(string $id)
    {
        $career = Career::findOrFail($id);
        $faculties = Faculty::all();
        return view('career.edit', compact('career', 'faculties'));
    }

    public function update(Request $request, string $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'name_career' => 'required|min:3',
            'code_career' => 'required|unique:careers,code,' . $id,
            'faculty_id_career' => 'required|exists:faculties,id',
            'duration_years_career' => 'required|integer|min:1|max:10',
            'level_career' => 'required',
            'degree_awarded_career' => 'required|min:3',
            'status_career' => 'required|in:activo,inactivo'
        ]);

        $datos = [
            'name' => $request->name_career,
            'code' => $request->code_career,
            'faculty_id' => $request->faculty_id_career,
            'duration_years' => $request->duration_years_career,
            'level' => $request->level_career,
            'degree_awarded' => $request->degree_awarded_career,
            'status' => $request->status_career
        ];

        $career->update($datos);

        return redirect()->route('career.index')->with('success', 'Carrera actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);

        // Cambiado de professors() a teachers()
        if ($career->teachers()->count() > 0) {
            return redirect()->route('career.index')
                ->with('error', 'No se puede eliminar la carrera porque tiene profesores asociados.');
        }

        $career->delete();

        return redirect()->route('career.index')
            ->with('success', 'Carrera eliminada correctamente.');
    }

}
