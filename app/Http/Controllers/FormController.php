<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class FormController extends Controller
{
    public function index()
    {
        return view('form', ['title' => 'Form']);
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|integer',
            'gpa' => 'required|between:1.00,4.00',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Process photo upload
        $photo = $request->file('photo');
        $photoName = time() . '.' . $photo->extension();
        $photo->move(public_path('photos'), $photoName);

        // Store data using Eloquent's mass assignment
        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'gpa' => $validated['gpa'],
            'photo' => $photoName,
        ]);

        // Show flash message
        session()->flash('success', 'Form berhasil disimpan');

        return view('result', ['data' => $validated, 'photoName' => $photoName, 'title' => 'Form Result']);
    }
}
