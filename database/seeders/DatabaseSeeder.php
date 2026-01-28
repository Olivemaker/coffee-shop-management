<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsersTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(FoodPriceTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(DrinkSizeTableSeeder::class);
        $this->call(DrinksImagesTableSeeder::class);
        $this->call(SesonalOffersTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(FinancialRecordTableSeeder::class);
        $this->call(SalariesTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(InventoryTableSeeder::class);
        $this->call(DeliveryTableSeeder::class);
    }
}
    