<form method="POST" action="{{ route('store-items.update', $item->id) }}" class="create-edit">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $item->id }}">
    <div>
        <label for="item-name">Название</label>
        <input type="text" name="name" id="item-name" value="{{ $item->name }}" required placeholder=" ">
    </div>
    <div>
        <label for="item-quantity">Количество</label>
        <input type="number" name="current_quantity" id="item-quantity" value="{{ $item->current_quantity }}" required placeholder=" " step="0.01">
    </div>
    <div>
        <select name="unit_measure" id="item-unit" required>
            <option value="">Единица измерения</option>
            <option value="кг" @selected($item->unit_measure == 'кг')>кг</option>
            <option value="шт" @selected($item->unit_measure == 'шт')>шт</option>
        </select>

    </div>
    <button type="submit">Обновить</button>
    <button type="button" id="cancel-edit">Отмена</button>
</form>