<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Staff;


class StaffControllerTest extends TestCase
{


    /** @test */
    public function it_creates_a_staff_member()
    {
        $response = $this->post(route('staff.store'), [
            'full_name' => 'Иванов Иван Иванович',
            'number' => '+79991234567',
            'address' => 'ул. Примерная, 123',
            'bday' => '1990-01-01',
            'color' => '#ff0000'
        ]);

        $response->assertRedirect(route('staff', ['section' => 'staff']))
                ->assertSessionHas('success');

        $this->assertCount(1, Staff::all());
        
        $staff = Staff::first();
        $this->assertEquals('Иванов Иван Иванович', $staff->full_name);
        $this->assertEquals('+79991234567', $staff->number);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_staff()
    {
        $response = $this->post(route('staff.store'), [
            // Пропускаем обязательные поля
            'color' => '#ff0000'
        ]);

        $response->assertSessionHasErrors(['full_name', 'number', 'address', 'bday']);
        $this->assertCount(0, Staff::all());
    }

    /** @test */
    public function it_updates_a_staff_member()
    {
        $staff = Staff::factory()->create([
            'full_name' => 'Петров Петр Петрович'
        ]);

        $response = $this->put(route('staff.update', $staff->id), [
            'full_name' => 'Сидоров Сидор Сидорович',
            'number' => '+79998887766',
            'address' => 'ул. Новая, 456',
            'bday' => '1985-05-15',
            'color' => '#00ff00'
        ]);

        $response->assertRedirect(route('staff', ['section' => 'staff']))
                ->assertSessionHas('success');


        $this->assertEquals('Сидоров Сидор Сидорович', $staff->full_name);
        $this->assertEquals('+79998887766', $staff->number);
    }

    /** @test */
    public function it_deletes_a_staff_member_and_related_schedule()
    {
        $staff = Staff::factory()->create();
        
        // Создаем связанную запись в расписании
        \DB::table('schedule')->insert([
            'id_staff' => $staff->id,
            'day' => 'Monday',
            'time' => '09:00-18:00'
        ]);

        $response = $this->delete(route('staff.destroy', $staff->id));

        $response->assertRedirect(route('staff', ['section' => 'staff']))
                ->assertSessionHas('success');

        $this->assertCount(0, Staff::all());
        $this->assertDatabaseMissing('schedule', ['id_staff' => $staff->id]);
    }

    /** @test */
    public function edit_page_shows_correct_staff_member()
    {
        $staff = Staff::factory()->create([
            'full_name' => 'Тестовый Сотрудник'
        ]);

        $response = $this->get(route('staff.edit', $staff->id));

        $response->assertOk()
                ->assertViewHas('employee', function ($employee) use ($staff) {
                    return $employee->id === $staff->id && 
                           $employee->full_name === 'Тестовый Сотрудник';
                });
    }

    /** @test */
    public function it_validates_phone_number_format()
    {
        $response = $this->post(route('staff.store'), [
            'full_name' => 'Тест',
            'number' => 'invalid-phone', // Невалидный формат
            'address' => 'ул. Тестовая',
            'bday' => '2000-01-01',
            'color' => '#000000'
        ]);

        $response->assertSessionHasErrors('number');
    }
}