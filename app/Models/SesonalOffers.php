<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesonalOffers extends Model
{
    use HasFactory;

    protected $table = 'SesonalOffers';
    protected $fillable = ['title', 'description', 'image_path', 'published'];

}
