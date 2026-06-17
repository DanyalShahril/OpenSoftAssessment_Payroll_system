@extends('layouts.app')

@section('title', 'Payslip - ' . $employee->name)

@section('content')
    <h1>Employee Payslip</h1>

    <a href="{{ route('employees.index') }}" class="btn" style="margin-bottom: 20px;">← Back to List</a>

    <div class="payslip-box">
        <h2 style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px;">
            PAYSLIP
        </h2>
        
        <div class="payslip-row">
            <span><strong>Employee:</strong></span>
            <span>{{ $employee->name }}</span>
        </div>
        
        <div class="payslip-row">
            <span><strong>Position:</strong></span>
            <span>{{ $employee->position }}</span>
        </div>
        
        <div class="payslip-row">
            <span><strong>Basic Salary:</strong></span>
            <span>RM {{ number_format($employee->basic_salary, 2) }}</span>
        </div>
        
        <div class="payslip-row">
            <span><strong>Allowance:</strong></span>
            <span>RM {{ number_format($employee->allowance, 2) }}</span>
        </div>
        
        <div class="payslip-row" style="border-top: 2px solid #333; margin-top: 10px; padding-top: 15px;">
            <span><strong>Gross Pay:</strong></span>
            <span>RM {{ number_format($grossPay, 2) }}</span>
        </div>
        
        <div class="payslip-row">
            <span><strong>Tax (5%):</strong></span>
            <span>RM {{ number_format($tax, 2) }}</span>
        </div>
        
        <div class="payslip-row payslip-total">
            <span><strong>Net Pay:</strong></span>
            <span>RM {{ number_format($netPay, 2) }}</span>
        </div>
    </div>
@endsection