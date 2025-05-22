<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Inventory;
use App\Models\Delivery;
use App\Models\Suppliers;

class WarehouseController extends Controller
{
    public function showProductRecord($section = 'warehouse')
    {
        $store = Store::all();
        $inventory = Inventory::with('store')->orderBy('date', 'desc')->get();
        $delivery = Delivery::with('store')->with('suppliers')->orderBy('date', 'desc')->get();
        $suppliers = Suppliers::all();
        
        $item = null; // Всегда null при обычном просмотре
        $supplier = null; // Всегда null при обычном просмотре
        
        return view('admin.warehouse', compact('section', 'store', 'inventory', 'delivery', 'suppliers', 'item', 'supplier'));
    }
    
    // Методы для работы со складом
    // создание элемента склада
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit_measure' => 'required|string|in:кг,шт',
        ]);
        
        Store::create([
            'name' => $validated['name'],
            'current_quantity' => $validated['quantity'],
            'unit_measure' => $validated['unit_measure'],
        ]);
        
        return redirect()->route('product-record', ['section' => 'warehouse'])
            ->with('success', 'Товар успешно добавлен!');
    }
    
    public function editStoreItem($id)
    {
        $item = Store::findOrFail($id);
        return view('admin.partials.store-item-edit', compact('item'));
    }
    // обновление элемента склада
    public function updateStoreItem(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'current_quantity' => 'required|numeric|min:0',
            'unit_measure' => 'required|string|in:кг,шт',
        ]);

            $item = Store::findOrFail($id);
            $item->update($validated);
            return redirect()->route('product-record', ['section' => 'warehouse'])
                ->with('success', 'Товар успешно обновлен!');
    }
    // удаление элемента склада
    public function deleteStoreItem($id)
    {
        $item = Store::findOrFail($id);
        $item->delete();
        
        return redirect()->route('product-record', ['section' => 'warehouse'])
            ->with('success', 'Товар успешно удален!');
    }
    
    // Методы для инвентаризации
    // сохранение инвентаризации
    public function storeInventory(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.id_item' => 'required|exists:store,id',
            'items.*.quantity' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);
        
        foreach ($validated['items'] as $itemData) {
            // Создаем запись инвентаризации
            Inventory::create([
                'id_item' => $itemData['id_item'],
                'quantity' => $itemData['quantity'],
                'date' => $validated['date'],
            ]);
            
            // Обновляем количество на складе
            $storeItem = Store::find($itemData['id_item']);
            $storeItem->update([
                'current_quantity' => $itemData['quantity'],
            ]);
        }
        
        return redirect()->route('product-record', ['section' => 'inventory'])
            ->with('success', 'Инвентаризация успешно сохранена!');
    }
    // поиск по датам
    public function searchInventory(Request $request)
    {
        $date = $request->input('date');
        $inventory = Inventory::with('store')
            ->when($date, function($query) use ($date) {
                return $query->whereDate('date', $date);
            })
            ->get();
            
        return view('admin.partials.inventory_table', compact('inventory'));
    }
    
    // Методы для поставок
    // добавление поставки
    public function storeDelivery(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.id_item' => 'required|exists:store,id',
            'items.*.quantity' => 'required|numeric|min:0',
            'items.*.id_supplier' => 'required|exists:suppliers,id',
            'items.*.date' => 'required|date',
        ]);
        
        foreach ($validated['items'] as $itemData) {
            // Создаем запись о поставке
            Delivery::create([
                'id_item' => $itemData['id_item'],
                'quantity' => $itemData['quantity'],
                'id_supplier' => $itemData['id_supplier'],
                'date' => $itemData['date'],
            ]);
            
            // Увеличиваем количество на складе
            $storeItem = Store::find($itemData['id_item']);
            $storeItem->increment('current_quantity', $itemData['quantity']);
        }
        
        return redirect()->route('product-record', ['section' => 'delivery'])
            ->with('success', 'Поставка успешно сохранена!');
    }
    // поиск поставки по дате и/или названию продукта или поставщика
    public function searchDelivery(Request $request)
    {
        $searchTerm = $request->input('q');
        $date = $request->input('date');
        
        $deliveries = Delivery::with(['store', 'suppliers'])
            ->when($searchTerm, function($query) use ($searchTerm) {
                return $query->whereHas('store', function($q) use ($searchTerm) {
                    $q->where('name', 'like', "%$searchTerm%");
                })->orWhereHas('suppliers', function($q) use ($searchTerm) {
                    $q->where('company', 'like', "%$searchTerm%");
                });
            })
            ->when($date, function($query) use ($date) {
                return $query->whereDate('date', $date);
            })
            ->get();
            
        return view('admin.partials.delivery_table', compact('deliveries'));
    }
    
    // Методы для поставщиков
    // создание записи
    public function storeSupplier(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
        ]);
        
        Suppliers::create($validated);
        
        return redirect()->route('product-record', ['section' => 'supplier'])
            ->with('success', 'Поставщик успешно добавлен!');
    }
    
    public function editSupplier($id)
    {
        $supplier = Suppliers::findOrFail($id);
        return view('admin.partials.supplier-edit', compact('supplier'));
    }
    // обновление записи
    public function updateSupplier(Request $request, $id)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
        ]);
        
        $supplier = Suppliers::findOrFail($id);
        $supplier->update($validated);
        
        return redirect()->route('product-record', ['section' => 'supplier'])
            ->with('success', 'Поставщик успешно обновлен!');
    }
    // удаление записи
    public function deleteSupplier($id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->delivery()->delete();
        $supplier->delete();
        
        return redirect()->route('product-record', ['section' => 'supplier'])
            ->with('success', 'Поставщик успешно удален!');
    }
}