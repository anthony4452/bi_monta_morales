<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Career;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('career')->get();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $careers = Career::all();
        return view('teacher.new', compact('careers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name_teacher' => 'required|min:2',
            'last_name_teacher' => 'required|min:2',
            'email_teacher' => 'required|email|unique:teachers,email',
            'phone_teacher' => 'required',
            'specialization_teacher' => 'required|min:3',
            'degree_teacher' => 'required|min:3',
            'career_id_teacher' => 'required|exists:careers,id',
            'photo_teacher' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $datos = [
            'first_name' => $request->first_name_teacher,
            'last_name' => $request->last_name_teacher,
            'email' => $request->email_teacher,
            'phone' => $request->phone_teacher,
            'specialization' => $request->specialization_teacher,
            'degree' => $request->degree_teacher,
            'career_id' => $request->career_id_teacher
        ];

        if ($request->hasFile('photo_teacher')) {
            $archivo = $request->file('photo_teacher');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('teachers/'), $nombreArchivo);
            $datos['photo'] = 'teachers/' . $nombreArchivo;
        }

        Teacher::create($datos);

        return redirect()->route('teacher.index')->with('success', 'Profesor creado exitosamente.');
    }

    public function show(string $id)
    {
        $teacher = Teacher::with('career')->findOrFail($id);
        return view('teacher.show', compact('teacher'));
    }

    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $careers = Career::all();
        return view('teacher.edit', compact('teacher', 'careers'));
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'first_name_teacher' => 'required|min:2',
            'last_name_teacher' => 'required|min:2',
            'email_teacher' => 'required|email|unique:teachers,email,' . $id,
            'phone_teacher' => 'required',
            'specialization_teacher' => 'required|min:3',
            'degree_teacher' => 'required|min:3',
            'career_id_teacher' => 'required|exists:careers,id',
            'photo_teacher' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $datos = [
            'first_name' => $request->first_name_teacher,
            'last_name' => $request->last_name_teacher,
            'email' => $request->email_teacher,
            'phone' => $request->phone_teacher,
            'specialization' => $request->specialization_teacher,
            'degree' => $request->degree_teacher,
            'career_id' => $request->career_id_teacher
        ];

        if ($request->hasFile('photo_teacher')) {
            if ($teacher->photo && File::exists(public_path($teacher->photo))) {
                File::delete(public_path($teacher->photo));
            }

            $archivo = $request->file('photo_teacher');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('teachers/'), $nombreArchivo);
            $datos['photo'] = 'teachers/' . $nombreArchivo;
        }

        $teacher->update($datos);

        return redirect()->route('teacher.index')->with('success', 'Profesor actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->photo && File::exists(public_path($teacher->photo))) {
            File::delete(public_path($teacher->photo));
        }

        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Profesor eliminado correctamente.');
    }
}