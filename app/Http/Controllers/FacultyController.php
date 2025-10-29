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

         $datos = [
            'name' => $request->name_fac,
            'acronym' => $request->acronym_fac,
            'dean_name' => $request->dean_name_fac,
            'phone' => $request->phone_fac,
            'email' => $request->email_fac,
            'year_foundation' => $request->year_foundation_fac
        ];

        if ($request->hasFile('logo_fac')) {
            $archivo = $request->file('logo_fac');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('logos/'), $nombreArchivo);
            $datos['logo'] = 'logos/' . $nombreArchivo;
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

        $datos = [
            'name' => $request->name_fac,
            'acronym' => $request->acronym_fac,
            'dean_name' => $request->dean_name_fac,
            'phone' => $request->phone_fac,
            'email' => $request->email_fac,
            'year_foundation' => $request->year_foundation_fac
        ];

        if ($request->hasFile('logo_fac')) {
            if ($faculty->logo && File::exists(public_path($faculty->logo))) {
                File::delete(public_path($faculty->logo));
            }

            $archivo = $request->file('logo_fac');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('logos/'), $nombreArchivo);
            $datos['logo'] = 'logos/' . $nombreArchivo;
        }

        $faculty->update($datos);

        return redirect()->route('faculty.index')->with('success', 'Facultad actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);

        if ($faculty->careers()->count() > 0) {
            return redirect()->route('faculty.index')
                ->with('error', 'No se puede eliminar la facultad porque tiene carreras asociadas.');
        }

        if ($faculty->logo && File::exists(public_path($faculty->logo))) {
            File::delete(public_path($faculty->logo));
        }

        $faculty->delete();

        return redirect()->route('faculty.index')
            ->with('success', 'Facultad eliminada correctamente.');
    }


}