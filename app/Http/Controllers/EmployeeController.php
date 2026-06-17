<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index(Request $request)
    {
        $query = Employee::query();
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('position', 'LIKE', "%{$search}%");
        }
        
        $employees = $query->orderBy('created_at', 'desc')->get();
        
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created employee in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'basic_salary' => 'required|numeric|min:0.01',
            'allowance' => 'required|numeric|min:0'
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in database.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'basic_salary' => 'required|numeric|min:0.01',
            'allowance' => 'required|numeric|min:0'
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified employee from database.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }

    /**
     * Display the payslip for the specified employee.
     */
    public function payslip(Employee $employee)
    {
        // Calculate payroll
        $grossPay = $employee->basic_salary + $employee->allowance;
        $tax = $grossPay * 0.05;
        $netPay = $grossPay - $tax;
        
        return view('employees.payslip', compact('employee', 'grossPay', 'tax', 'netPay'));
    }
}