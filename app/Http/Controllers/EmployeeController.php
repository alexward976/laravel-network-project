<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        // route --> /employees/
        // fetch all records and pass into index view

        $employees = Employee::with('group')->orderBy('created_at', 'desc')->paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }

    public function show(Employee $employee) {
        // route --> /employees/{id}
        // fetch a single record and pass into show view

        $employee->load('group');

        return view('employees.show', ['employee' => $employee]);
    }

    public function create() {
        // route --> /employees/create
        // render a create view (with web form) 

        $groups = Group::all();

        return view('employees.create', ['groups' => $groups]);
    }

    public function store(Request $request) {
        // route --> /employees/ (POST)
        // handle POST request to store a new employee record in table

        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'skill'=> 'required|integer|min:0|max:100',
            'bio'=> 'required|string|min:20|max:1000',
            'group_id' => 'required|exists:groups,id',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created.');
    }

    public function destroy(Employee $employee) {
        // route --> /employees/{id} (DELETE)
        // handle delete request to delete a employee record from table

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}
