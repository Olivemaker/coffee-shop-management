<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Menu;
use App\Models\FoodPrice;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'Category';

    public function menu(){
        return $this->hasMany(Menu::class);
    }

    public function foodprice(){
        return $this->hasOne(FoodPrice::class);
    }
}
