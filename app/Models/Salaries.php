<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Staff;
use App\Models\FinancialRecord;

class Salaries extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function financialrecord(){
        return $this->belongsTo(FinancialRecord::class);
    }
}
