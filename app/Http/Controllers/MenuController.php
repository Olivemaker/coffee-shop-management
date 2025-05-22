<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\DrinksImages;
use App\Models\DrinkSize;
use App\Models\SesonalOffers;
use App\Models\FoodPrice;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class MenuController extends Controller
{
    public function showMenu($section = 'menu') {
        $categories = Category::with(['menu' => function($query) {
            $query->orderBy('name');
        }])->get();
        
        $hot = $categories->where('name', 'Hot');
        $cold = $categories->where('name', 'Cold');
        $snacks = $categories->whereIn('name', ['Sandwich', 'Mochi', 'Donat', 'Cheesecake', 'Salad']);

        $categories = Category::all();
        $sesonalOffers = SesonalOffers::all();

        $item = null;
        
        return view('admin.menu', compact('section', 'categories', 'hot', 'cold', 'snacks', 'sesonalOffers', 'item'));
    }

    public function search(Request $request) {
        $search = $request->input('search');
        
        $items = Menu::where('name', 'like', '%'.$search.'%')
            ->with(['category', 'drinksize', 'drinkimage'])
            ->get()
            ->groupBy('category.name');
            
        return response()->json([
            'hot' => $items->get('Hot', collect()),
            'cold' => $items->get('Cold', collect()),
            'snacks' => $items->filter(fn($item, $key) => in_array($key, ['Sandwich', 'Mochi', 'Donat', 'Cheesecake', 'Salad']))
        ]);
    }

    // создание позиции меню
    public function store(Request $request) 
    {
        // Валидация основных полей
        $request->validate([
            'category_id' => 'required|exists:category,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:20480'
        ]);
        $category = Category::findOrFail($request->category_id);
        // Создаём запись в меню
        $menuItem = Menu::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'status' => 'active'
        ]);
        // Обработка напитков (Hot/Cold)
        if (in_array($category->name, ['Hot', 'Cold'])) {
            // Валидация цен для размеров
            $request->validate([
                'price_s' => 'required|numeric|min:0',
                'price_m' => 'required|numeric|min:0',
                'price_l' => 'required|numeric|min:0',
            ]);
            // Сохраняем цены размеров
            DrinkSize::insert([
                ['menu_id' => $menuItem->id, 'size' => 'S', 'price' => $request->price_s],
                ['menu_id' => $menuItem->id, 'size' => 'M', 'price' => $request->price_m],
                ['menu_id' => $menuItem->id, 'size' => 'L', 'price' => $request->price_l],
            ]);
            // Обработка изображения (если передано)
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('menu', 'public');
                DrinksImages::create([
                    'menu_id' => $menuItem->id,
                    'image_path' => $path
                ]);
            }
        } else {
            // Обработка закусок (если указана цена)
            if ($request->filled('price')) {
                FoodPrice::updateOrCreate(
                    ['category_id' => $category->id],
                    ['price' => $request->price]
                );
            }
        }
        return redirect()->route('menu', ['section' => 'menu'])
                       ->with('success', 'Позиция меню добавлена');
    }

    public function edit($id) {
        $item = Menu::with(['category', 'drinksize', 'drinkimage', 'category.foodprice'])->findOrFail($id);
        $categories = Category::all();
        
        $categoryName = [
            'Hot' => 'Горячий напиток',
            'Cold' => 'Холодный напиток',
            'Sandwich' => 'Сэндвич',
            'Salad' => 'Салат',
            'Mochi' => 'Моти',
            'Donat' => 'Донат',
            'Cheesecake' => 'Чизкейк',
        ];
        
        return view('admin.partials.menu-item-edit', compact('item', 'categories', 'categoryName'));
    }

    // обновление позиции меню
    public function update(Request $request, $id) {
        $menuItem = Menu::with(['category', 'drinksize', 'drinkimage'])->findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:20480'
        ]);
        $menuItem->update(['name' => $request->name]);
        if (in_array($menuItem->category->name, ['Hot', 'Cold'])) {
            // обновление цен напитков
            $request->validate([
                'price_s' => 'required|numeric|min:0',
                'price_m' => 'required|numeric|min:0',
                'price_l' => 'required|numeric|min:0',
            ]);
            foreach ($menuItem->drinksize as $size) {
                $sizeField = 'price_' . strtolower($size->size);
                if ($request->has($sizeField)) {
                    $size->update(['price' => $request->$sizeField]);
                }
            }
            if ($request->hasFile('image')) {
                // обновление изображения
                if ($menuItem->drinkimage) {
                    Storage::delete('public/' . $menuItem->drinkimage->image_path);
                    $menuItem->drinkimage->delete();
                }        
                $path = $request->file('image')->store('menu', 'public');
                DrinksImages::create([
                    'menu_id' => $menuItem->id,
                    'image_path' => $path
                ]);
            }
        } elseif ($request->filled('price')) {
            // обновление цены категории закусок
            FoodPrice::updateOrCreate(
                ['category_id' => $menuItem->category_id],
                ['price' => $request->price]
            );
        }
         return redirect()->route('menu', ['section' => 'menu'])->with('success', 'Позиция меню обновлена');
    }
    // отмена редактирования записи
    public function cancelEdit() {
        return redirect()->route('menu', ['section' => 'menu']);
    }

    // удаление позиции меню
    public function destroy($id) {
        $menuItem = Menu::with(['drinksize', 'drinkimage'])->findOrFail($id);
        
        if ($menuItem->drinkimage) {
            Storage::delete('public/' . $menuItem->drinkimage->image_path);
            $menuItem->drinkimage->delete();
        }
        
        $menuItem->drinksize()->delete();
        $menuItem->delete();
        
        return redirect()->route('menu', ['section' => 'menu'])->with('success', 'Позиция меню удалена');
    }

    public function toggleStatus($id) {
        $menuItem = Menu::findOrFail($id);
        
        $menuItem->update([
            'status' => $menuItem->status === 'active' ? 'inactive' : 'active'
        ]);
        
        return redirect()->route('menu', ['section' => 'menu'])->with('success', 'Статус позиции изменен');
    }

    public function editOffer($id) {
        $offer = SesonalOffers::findOrFail($id);
        $editable = request()->has('editable');
        
        return view('admin.menu', [
            'offer' => $offer,
            'editable' => $editable
        ]);
    }

    // обновление сезонного предложения
    public function updateOffer(Request $request, $id)
    {
        $offer = SesonalOffers::findOrFail($id);
        // Проверяем, переданы ли title и description в запросе
        $hasTitle = $request->filled('title');
        $hasDescription = $request->filled('description');
        // Если title/description не переданы, используем старые значения
        $title = $hasTitle ? $request->title : $offer->title;
        $description = $hasDescription ? $request->description : $offer->description;
        // Валидация (только если поля переданы и не пустые)
        $request->validate([
            'title' => $hasTitle ? 'required|string|max:255' : 'nullable',
            'description' => $hasDescription ? 'required|string' : 'nullable',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:20480'
        ]);
        // Если title/description пустые И их не было в БД — ошибка
        if (empty($title)) {
            return back()->with('error', 'Заголовок не может быть пустым!');
        }
        if (empty($description)) {
            return back()->with('error', 'Описание не может быть пустым!');
        }
        // Обновляем данные
        $offer->title = $title;
        $offer->description = $description;
        // Обновляем изображение (если передано)
        if ($request->hasFile('image')) {
            // Удаляем старое изображение
            if ($offer->image_path && Storage::exists('public/' . $offer->image_path)) {
                Storage::delete('public/' . $offer->image_path);
            }
            // Сохраняем новое
            $imagePath = $request->file('image')->store('menu', 'public');
            $offer->image_path = str_replace('public/', '', $imagePath);
        }
        $offer->save();
        return redirect()->route('menu', ['section' => 'sesonal-offers'])
                       ->with('success', 'Предложение успешно обновлено!');
    }

    public function publishOffer($id) {
        SesonalOffers::where('published', true)->update(['published' => false]);
        
        $offer = SesonalOffers::findOrFail($id);
        $offer->update(['published' => true]);
        
        return redirect()->route('menu', ['section' => 'sesonal-offers'])
                       ->with('success', 'Предложение опубликовано');
    }
}