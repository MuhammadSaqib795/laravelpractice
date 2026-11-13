<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
// use App\Models\Book;
// use App\Models\Department;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        // $books = Book::all();
        // $departments = Department::all();
        // return view('student', compact('students', 'books', 'departments'));

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'book_id' => 'nullable|exists:books,id',
            // 'department_id' => 'required|exists:departments,id',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->city = $request->input('city');
        $student->age = $request->input('age');
        // $student->book_id = $request->input('book_id');
        // $student->department_id = $request->input('department_id');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $student->image_path = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'book_id' => 'nullable|exists:books,id',
            // 'department_id' => 'required|exists:departments,id',
        ]);

        $student->name = $request->input('name');
        $student->city = $request->input('city');
        $student->age = $request->input('age');
        // $student->book_id = $request->input('book_id');
        // $student->department_id = $request->input('department_id');

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($student->image_path) {
                \Storage::disk('public')->delete($student->image_path);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $student->image_path = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
