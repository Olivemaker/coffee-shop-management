<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inventory;
use App\Models\Delivery;
class Store extends Model
{
    use HasFactory;

    protected $table = 'Store';

    protected $fillable = ['name', 'current_quantity', 'unit_measure'];


    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

    public function delivery(){
        return $this->hasMany(Delivery::class);
    }
}
