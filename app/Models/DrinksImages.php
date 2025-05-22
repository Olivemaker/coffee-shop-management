<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
class DrinksImages extends Model
{
    use HasFactory;

    protected $table = 'DrinksImages';
    protected $fillable = ['image_path', 'menu_id'];


    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
