<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Staff;
use App\Models\Shifts;

class Schedule extends Model
{

    protected $table = 'Schedule';

    protected $fillable = ['id_staff', 'date', 'shift'];

    use HasFactory;
    
    public function staff(){
        return $this->belongsTo(Staff::class);
    }

}
