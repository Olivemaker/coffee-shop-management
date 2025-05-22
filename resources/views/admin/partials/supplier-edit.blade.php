<form method="POST" action="{{ route('suppliers.update', $supplier->id) }}" class="create-edit">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $supplier->id }}">
    <div>
        <label for="company">Наименование компании</label>
        <input type="text" name="company" id="company" value="{{ $supplier->company }}" required>
    </div>
    <div>
        <label for="full-name">ФИО контактного лица</label>
        <input type="text" name="contact_name" id="full-name" value="{{ $supplier->contact_name }}" required
               pattern="^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$"
               title="Введите ФИО в формате: Фамилия Имя Отчество">
    </div>
    <div>
        <label for="number">Номер телефона</label>
        <input type="tel" name="number" id="number" value="{{ $supplier->number }}" required
               pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}"
               title="Введите номер в формате: +7 (XXX) XXX-XX-XX">
    </div>
    <button type="submit">Обновить</button>
    <button type="button" id="cancel-edit-supplier">Отмена</button>
</form>