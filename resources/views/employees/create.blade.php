@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <h1>Add New Employee</h1>

    <a href="{{ route('employees.index') }}" class="btn" style="margin-bottom: 20px;">← Back to List</a>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="position">Position *</label>
            <input type="text" id="position" name="position" value="{{ old('position') }}" required>
            @error('position')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="basic_salary">Basic Salary (RM) *</label>
            <input type="number" id="basic_salary" name="basic_salary" step="0.01" min="0.01" 
                   value="{{ old('basic_salary') }}" required>
            @error('basic_salary')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="allowance">Allowance (RM) *</label>
            <input type="number" id="allowance" name="allowance" step="0.01" min="0" 
                   value="{{ old('allowance') }}" required>
            @error('allowance')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Employee</button>
    </form>
@endsection