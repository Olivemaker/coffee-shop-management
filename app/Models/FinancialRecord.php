<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Salaries;

class FinancialRecord extends Model
{
    use HasFactory;

    protected $table = 'FinancialRecord';
    protected $fillable = ['type', 'payment_method', 'amount', 'date'];

    public function salaries(){
        return $this->hasOne(Salaries::class);
    }
}
