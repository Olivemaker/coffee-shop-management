<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Salaries;
use App\Models\Schedule;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'Staff';
    protected $fillable = ['full_name', 'bday', 'address', 'number', 'color'];

    public function salaries(){
        return $this->hasMany(Salaries::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
