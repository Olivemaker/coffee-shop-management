<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\Category;
use App\Models\DrinkSize;
use App\Models\DrinksImages;
use App\Models\FoodPrice;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class MenuControllerTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        
        // Создаём тестовые категории
        Category::factory()->create(['name' => 'Hot']);
        Category::factory()->create(['name' => 'Cold']);
        Category::factory()->create(['name' => 'Sandwich']);
        
        // Настраиваем фейковое хранилище для изображений
        Storage::fake('public');
    }

    /** @test */
    public function it_creates_a_drink_menu_item_with_sizes_and_image()
    {
        $category = Category::where('name', 'Hot')->first();
        
        $response = $this->post(route('menu.store'), [
            'category_id' => $category->id,
            'name' => 'Latte',
            'price_s' => 2.50,
            'price_m' => 3.50,
            'price_l' => 4.50,
            'image' => UploadedFile::fake()->image('latte.jpg')
        ]);
        
        $response->assertRedirect(route('menu', ['section' => 'menu']))
                ->assertSessionHas('success');
                
        $this->assertCount(1, Menu::all());
        $this->assertCount(3, DrinkSize::all());
        $this->assertCount(1, DrinksImages::all());
        
        $menuItem = Menu::first();
        $this->assertEquals('Latte', $menuItem->name);
        $this->assertEquals('active', $menuItem->status);
        
        // Проверяем цены размеров
        $this->assertEquals(2.50, $menuItem->drinksize->where('size', 'S')->first()->price);
        $this->assertEquals(3.50, $menuItem->drinksize->where('size', 'M')->first()->price);
        $this->assertEquals(4.50, $menuItem->drinksize->where('size', 'L')->first()->price);
        
        // Проверяем сохранение изображения
        Storage::disk('public')->assertExists('menu/'.$menuItem->drinkimage->image_path);
    }

    /** @test */
    public function it_creates_a_food_menu_item_with_category_price()
    {
        $category = Category::where('name', 'Sandwich')->first();
        
        $response = $this->post(route('menu.store'), [
            'category_id' => $category->id,
            'name' => 'Chicken Sandwich',
            'price' => 5.99
        ]);
        
        $response->assertRedirect(route('menu', ['section' => 'menu']))
                ->assertSessionHas('success');
                
        $this->assertCount(1, Menu::all());
        $this->assertCount(0, DrinkSize::all());
        
        $foodPrice = FoodPrice::where('category_id', $category->id)->first();
        $this->assertEquals(5.99, $foodPrice->price);
    }

    /** @test */
    public function it_updates_a_drink_menu_item()
    {
        $category = Category::where('name', 'Cold')->first();
        $menuItem = Menu::factory()->create(['category_id' => $category->id]);
        DrinkSize::factory()->create(['menu_id' => $menuItem->id, 'size' => 'S', 'price' => 2.00]);
        DrinkSize::factory()->create(['menu_id' => $menuItem->id, 'size' => 'M', 'price' => 3.00]);
        DrinkSize::factory()->create(['menu_id' => $menuItem->id, 'size' => 'L', 'price' => 4.00]);
        
        $response = $this->put(route('menu.update', $menuItem->id), [
            'name' => 'Updated Iced Coffee',
            'price_s' => 2.50,
            'price_m' => 3.50,
            'price_l' => 4.50,
            'image' => UploadedFile::fake()->image('new-image.jpg')
        ]);
        
        $response->assertRedirect(route('menu', ['section' => 'menu']))
                ->assertSessionHas('success');
                
        $this->assertEquals('Updated Iced Coffee', $menuItem->name);
        
        // Проверяем обновление цен
        $this->assertEquals(2.50, $menuItem->drinksize->where('size', 'S')->first()->price);
        $this->assertEquals(3.50, $menuItem->drinksize->where('size', 'M')->first()->price);
        $this->assertEquals(4.50, $menuItem->drinksize->where('size', 'L')->first()->price);
        
        // Проверяем наличие нового изображения
        $this->assertCount(1, DrinksImages::all());
        Storage::disk('public')->assertExists('menu/'.$menuItem->drinkimage->image_path);
    }

    /** @test */
    public function it_deletes_a_menu_item_with_related_data()
    {
        $category = Category::where('name', 'Hot')->first();
        $menuItem = Menu::factory()->create(['category_id' => $category->id]);
        DrinkSize::factory()->create(['menu_id' => $menuItem->id]);
        $image = DrinksImages::factory()->create(['menu_id' => $menuItem->id]);
        
        $response = $this->delete(route('menu.destroy', $menuItem->id));
        
        $response->assertRedirect(route('menu', ['section' => 'menu']))
                ->assertSessionHas('success');
                
        $this->assertCount(0, Menu::all());
        $this->assertCount(0, DrinkSize::all());
        $this->assertCount(0, DrinksImages::all());
        
        // Проверяем удаление файла изображения
        Storage::disk('public')->assertMissing($image->image_path);
    }

    /** @test */
    public function it_toggles_menu_item_status()
    {
        $menuItem = Menu::factory()->create(['status' => 'active']);
        
        $response = $this->get(route('menu.toggle-status', $menuItem->id));
        
        $response->assertRedirect(route('menu', ['section' => 'menu']))
                ->assertSessionHas('success');
                
        $this->assertEquals('inactive', $menuItem->fresh()->status);
        
        // Повторный вызов должен вернуть статус active
        $this->get(route('menu.toggle-status', $menuItem->id));
        $this->assertEquals('active', $menuItem->fresh()->status);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_drink()
    {
        $category = Category::where('name', 'Hot')->first();
        
        $response = $this->post(route('menu.store'), [
            'category_id' => $category->id,
            // name отсутствует
            'price_s' => '', // обязательное поле для напитков
        ]);
        
        $response->assertSessionHasErrors(['name', 'price_s', 'price_m', 'price_l']);
    }

    /** @test */
    public function edit_page_shows_correct_data()
    {
        $category = Category::where('name', 'Hot')->first();
        $menuItem = Menu::factory()->create(['category_id' => $category->id]);
        DrinkSize::factory()->create(['menu_id' => $menuItem->id, 'size' => 'S', 'price' => 2.00]);
        
        $response = $this->get(route('menu.edit', $menuItem->id));
        
        $response->assertOk()
                ->assertViewHas('item', function ($item) use ($menuItem) {
                    return $item->id === $menuItem->id;
                })
                ->assertViewHas('categories');
    }

    /** @test */
    public function cancel_edit_redirects_to_menu()
    {
        $response = $this->get(route('menu.cancel-edit'));
        
        $response->assertRedirect(route('menu', ['section' => 'menu']));
    }
}