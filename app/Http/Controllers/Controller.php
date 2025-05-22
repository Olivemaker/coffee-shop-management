<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Menu;
use App\Models\Category;
use App\Models\SesonalOffers;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showPublic(){

        $categories = Category::with(['menu' => function($query) {
            $query->orderBy('name');
        }])->get();
        
        $hot = $categories->where('name', 'Hot');
        $cold = $categories->where('name', 'Cold');
        $snacks = $categories->whereIn('name', ['Sandwich', 'Mochi', 'Donat', 'Cheesecake', 'Salad']);
        $sesonalOffers = SesonalOffers::all();
        return view('layouts.public', compact('hot', 'cold', 'snacks', 'sesonalOffers'));
    }
}
