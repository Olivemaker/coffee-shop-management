<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Delivery;

class Suppliers extends Model
{
    use HasFactory;

    protected $table = 'Suppliers';
    protected $fillable = ['company', 'contact_name', 'number'];
    

    public function delivery(){
        return $this->hasMany(Delivery::class, 'id_supplier');
    }
}
