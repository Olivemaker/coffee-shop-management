<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;
use App\Models\Suppliers;

class Delivery extends Model
{
    use HasFactory;

        protected $table = 'Delivery';
        protected $fillable = ['id_item', 'id_supplier', 'quantity', 'date'];

    public function store(){
        return $this->belongsTo(Store::class, 'id_item');
    }

    public function suppliers(){
        return $this->belongsTo(Suppliers::class, 'id_supplier');
    }
}
