<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use App\Models\Employee;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = department::withCount('employees')
            ->orderByDesc('id')
            ->paginate(10);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
        ]);
        department::create($validated);
        return redirect()->route('departments.index')->with('success', 'Department added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        $department->load('employees');

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:250',
                Rule::unique('departments', 'name')
                    ->ignore($department->id),
            ],
        ]);

        $department->update($validated);
        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully!');
    }


}
