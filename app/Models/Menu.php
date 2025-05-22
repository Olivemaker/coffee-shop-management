<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Status;
use App\Models\Category;
use App\Models\DrinkSize;
use App\Models\DrinksImages;
use App\Models\FoodPrice;
class Menu extends Model
{
    use HasFactory;

    protected $table = 'Menu';
    protected $fillable = ['category_id', 'name', 'status'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function drinksize(){
        return $this->hasMany(DrinkSize::class);
    }
    
    public function drinkimage(){
        return $this->hasOne(DrinksImages::class);
    }
}
