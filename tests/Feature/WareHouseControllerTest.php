<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Store;


class WareHouseControllerTest extends TestCase
{


    // Тест создания элемента склада
    /** @test */
    public function it_creates_a_store_item()
    {
        $response = $this->post(route('store.store-item'), [
            'name' => 'Мука пшеничная',
            'current_quantity' => 50,
            'unit_measure' => 'кг'
        ]);

        $response->assertRedirect(route('product-record', ['section' => 'warehouse']))
                ->assertSessionHas('success');

        $this->assertCount(1, Store::all());
        
        $item = Store::first();
        $this->assertEquals('Мука пшеничная', $item->name);
        $this->assertEquals(50, $item->current_quantity);
        $this->assertEquals('кг', $item->unit_measure);
    }

    // Тест валидации при создании
    /** @test */
    public function it_validates_store_item_creation()
    {
        $response = $this->post(route('store.store-item'), [
            'name' => '', // пустое имя
            'current_quantity' => -5, // отрицательное количество
            'unit_measure' => 'литр' // недопустимая единица измерения
        ]);

        $response->assertSessionHasErrors([
            'name', 
            'current_quantity',
            'unit_measure'
        ]);
    }

    // Тест страницы редактирования
    /** @test */
    public function edit_page_shows_correct_store_item()
    {
        $item = Store::factory()->create([
            'name' => 'Сахар'
        ]);

        $response = $this->get(route('store.edit-store-item', $item->id));

        $response->assertOk()
                ->assertViewHas('item', function ($viewItem) use ($item) {
                    return $viewItem->id === $item->id && 
                           $viewItem->name === 'Сахар';
                });
    }

    // Тест обновления элемента
    /** @test */
    public function it_updates_a_store_item()
    {
        $item = Store::factory()->create([
            'name' => 'Старое название',
            'current_quantity' => 10,
            'unit_measure' => 'шт'
        ]);

        $response = $this->put(route('store.update-store-item', $item->id), [
            'name' => 'Новое название',
            'current_quantity' => 20,
            'unit_measure' => 'кг'
        ]);

        $response->assertRedirect(route('product-record', ['section' => 'warehouse']))
                ->assertSessionHas('success');


        $this->assertEquals('Новое название', $item->name);
        $this->assertEquals(20, $item->current_quantity);
        $this->assertEquals('кг', $item->unit_measure);
    }

    // Тест удаления элемента
    /** @test */
    public function it_deletes_a_store_item()
    {
        $item = Store::factory()->create();

        $response = $this->delete(route('store.delete-store-item', $item->id));

        $response->assertRedirect(route('product-record', ['section' => 'warehouse']))
                ->assertSessionHas('success');

        $this->assertCount(0, Store::all());
        $this->assertDatabaseMissing('stores', ['id' => $item->id]);
    }

    // Тест граничных значений количества
    /** @test */
    public function it_accepts_zero_quantity()
    {
        $response = $this->post(route('store.store-item'), [
            'name' => 'Соль',
            'current_quantity' => 0, // минимально допустимое значение
            'unit_measure' => 'кг'
        ]);

        $response->assertSessionDoesntHaveErrors('quantity');
        $this->assertEquals(0, Store::first()->current_quantity);
    }
}