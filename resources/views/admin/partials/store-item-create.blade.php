<form method="POST" action="{{ route('store-items.store') }}" class="create-edit">
    @csrf
    <div>
        <label for="item-name">Название</label>
        <input type="text" name="name" id="item-name" required placeholder=" ">
    </div>
    <div>
        <label for="item-quantity">Количество</label>
        <input type="number" name="quantity" id="item-quantity" required placeholder=" " step="0.01">
    </div>
    <div>
        <select name="unit_measure" id="item-unit" required>
            <option value="">Единица измерения</option>
            <option value="кг">кг</option>
            <option value="шт">шт</option>
        </select>
    </div>
    <button type="submit">Создать</button>
</form>