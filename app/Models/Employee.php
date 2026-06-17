<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'basic_salary',
        'allowance'
    ];


    public function getGrossPayAttribute()
    {
        return $this->basic_salary + $this->allowance;
    }

    public function getTaxAttribute()
    {
        return $this->getGrossPayAttribute() * 0.05;
    }

    public function getNetPayAttribute()
    {
        return $this->getGrossPayAttribute() - $this->getTaxAttribute();
    }

 
    public function getFormattedBasicSalaryAttribute()
    {
        return 'RM ' . number_format($this->basic_salary, 2);
    }

    public function getFormattedAllowanceAttribute()
    {
        return 'RM ' . number_format($this->allowance, 2);
    }

    public function getFormattedGrossPayAttribute()
    {
        return 'RM ' . number_format($this->getGrossPayAttribute(), 2);
    }

    public function getFormattedTaxAttribute()
    {
        return 'RM ' . number_format($this->getTaxAttribute(), 2);
    }

    public function getFormattedNetPayAttribute()
    {
        return 'RM ' . number_format($this->getNetPayAttribute(), 2);
    }
}