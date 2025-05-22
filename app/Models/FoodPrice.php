<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
class FoodPrice extends Model
{
    use HasFactory;

    protected $table = 'FoodPrice';
    protected $fillable = ['price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
