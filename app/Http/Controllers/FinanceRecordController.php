<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialRecord;

class FinanceRecordController extends Controller
{
    public function showFinanceRecord($section = 'finance')
    {
        $finance = FinancialRecord::orderBy('date', 'desc')->get();
        return view('admin.financerecord', compact('section', 'finance'));
    }

    // сохранение финансовой операции
    public function storeOperations(Request $request)
    {
        $validated = $request->validate([
            'operations' => 'required|array',
            'operations.*.type' => 'required|in:выручка,такси,ЗП,поставка',
            'operations.*.payment_method' => 'required|in:наличные,карта',
            'operations.*.amount' => 'required|numeric|min:0',
            'operations.*.date' => 'required|date',
        ]);

        foreach ($validated['operations'] as $operation) {
            FinancialRecord::create($operation);
        }

        return redirect()->route('finance-record', ['section' => 'finance'])
            ->with('success', 'Операции успешно добавлены!');
    }

    // поиск по дате операции
    public function searchOperations(Request $request)
    {
        $date = $request->input('search-date');

        $operations = FinancialRecord::query()
            ->when($date, function($query) use ($date) {
                return $query->whereDate('date', $date);
            })
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.partials.finance_table', compact('operations'));
    }
}