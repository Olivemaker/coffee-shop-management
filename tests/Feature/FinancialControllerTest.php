<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\FinancialRecord;


class FinancialControllerTest extends TestCase
{


    /** @test */
    public function it_stores_multiple_financial_operations()
    {
        $operations = [
            'operations' => [
                [
                    'type' => 'выручка',
                    'payment_method' => 'наличные',
                    'amount' => 15000,
                    'date' => '2023-05-01'
                ],
                [
                    'type' => 'ЗП',
                    'payment_method' => 'карта',
                    'amount' => 5000,
                    'date' => '2023-05-01'
                ]
            ]
        ];

        $response = $this->post(route('finance.store-operations'), $operations);

        $response->assertRedirect(route('finance-record', ['section' => 'finance']))
                ->assertSessionHas('success');

        $this->assertCount(2, FinancialRecord::all());
        $this->assertEquals(15000, FinancialRecord::first()->amount);
    }

    /** @test */
    public function it_validates_financial_operations()
    {
        $invalidOperations = [
            'operations' => [
                [
                    'type' => 'неверный тип', // недопустимый тип
                    'payment_method' => 'неверный метод', // недопустимый метод
                    'amount' => -100, // отрицательная сумма
                    // пропущена дата
                ]
            ]
        ];

        $response = $this->post(route('finance.store-operations'), $invalidOperations);

        $response->assertSessionHasErrors([
            'operations.0.type',
            'operations.0.payment_method',
            'operations.0.amount',
            'operations.0.date'
        ]);
    }

    /** @test */
    public function it_searches_operations_by_date()
    {
        // Создаем тестовые данные
        FinancialRecord::factory()->create(['date' => '2023-05-01']);
        FinancialRecord::factory()->create(['date' => '2023-05-02']);
        FinancialRecord::factory()->create(['date' => '2023-05-02']);

        // Ищем операции за конкретную дату
        $response = $this->get(route('finance.search-operations', [
            'search-date' => '2023-05-02'
        ]));

        $response->assertOk();
        $this->assertCount(2, $response->viewData('operations'));
    }

    /** @test */
    public function it_returns_all_operations_when_no_date_provided()
    {
        FinancialRecord::factory()->count(3)->create();

        $response = $this->get(route('finance.search-operations'));

        $response->assertOk();
        $this->assertCount(3, $response->viewData('operations'));
    }
}