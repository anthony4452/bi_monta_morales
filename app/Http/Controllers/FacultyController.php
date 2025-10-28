<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\File;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::all();
        return view('faculty.index', compact('faculty'));
    }

    public function create()
    {
        return view('faculty.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_fac' => 'required|min:3',
            'acronym_fac' => 'required|min:1',
            'dean_name_fac' => 'required|min:3',
            'phone_fac' => 'required',
            'email_fac' => 'required|email',
            'year_foundation_fac' => 'required|integer',
            'logo_fac' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $datos = $request->except('logo_fac');

        if ($request->hasFile('logo_fac')) {
            $archivo = $request->file('logo_fac');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('logos/'), $nombreArchivo);
            $datos['logo_fac'] = 'logos/' . $nombreArchivo;
        }

        Faculty::create($datos);

        return redirect()->route('faculty.index')->with('success', 'Facultad creada exitosamente.');
    }

    public function show(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.show', compact('faculty'));
    }

    public function edit(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.edit', compact('faculty'));
    }

    public function update(Request $request, string $id)
    {
        $faculty = Faculty::findOrFail($id);

        $request->validate([
            'name_fac' => 'required|min:3',
            'acronym_fac' => 'required|min:1',
            'dean_name_fac' => 'required|min:3',
            'phone_fac' => 'required',
            'email_fac' => 'required|email',
            'year_foundation_fac' => 'required|integer',
            'logo_fac' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $datos = $request->except('logo_fac');

        if ($request->hasFile('logo_fac')) {
            // eliminar logo anterior si existe
            if ($faculty->logo_fac && File::exists(public_path($faculty->logo_fac))) {
                File::delete(public_path($faculty->logo_fac));
            }

            $archivo = $request->file('logo_fac');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('logos/'), $nombreArchivo);
            $datos['logo_fac'] = 'logos/' . $nombreArchivo;
        }

        $faculty->update($datos);

        return redirect()->route('faculty.index')->with('success', 'Facultad actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);

        // eliminar logo si existe
        if ($faculty->logo_fac && File::exists(public_path($faculty->logo_fac))) {
            File::delete(public_path($faculty->logo_fac));
        }

        $faculty->delete();

        return redirect()->route('faculty.index')->with('success', 'Facultad eliminada correctamente.');
    }
}
