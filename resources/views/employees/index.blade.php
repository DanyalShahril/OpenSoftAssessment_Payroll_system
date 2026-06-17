@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
    <h1>Employee Payroll Management System</h1>
    
    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="header-actions">
        <a href="{{ route('employees.create') }}" class="btn btn-success">
            + Add New Employee
        </a>
        
        <form action="{{ route('employees.index') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Search by name or position..." 
                   value="{{ request('search') }}">
            <button type="submit" class="btn">Search</button>
            @if(request('search'))
                <a href="{{ route('employees.index') }}" class="btn">Clear</a>
            @endif
        </form>
    </div>

    @if($employees->isEmpty())
        <p style="text-align: center; padding: 40px 0; color: #666;">
            No employees found. Add your first employee!
        </p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Basic Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->formatted_basic_salary }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                                
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                
                                <a href="{{ route('employees.payslip', $employee) }}" class="btn">View Payslip</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection