<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    //
    public function index()
    {
        $employees = Employee::all(); // Fetch employees from the database

        return view('employee.index',compact('employees'));
    }

    public function create()
    {
        // Show the form to create a new employee
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        Employee::create($request->all());


        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
    public function edit($id)
    {
        // Show the form to edit an existing employee
        $employee = Employee::findOrFail($id);

        // You need to fetch the employee details based on $id
        // For example, $employee = Employee::findOrFail($id);

        return view('employee.edit', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

}
