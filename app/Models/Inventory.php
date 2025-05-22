<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;
class Inventory extends Model
{
    use HasFactory;

        protected $table = 'Inventory';
        protected $fillable = ['id_item', 'quantity', 'date', 'created_at', 'updated_at'];

        public function store(){
            return $this->belongsTo(Store::class, 'id_item');
        }

}
