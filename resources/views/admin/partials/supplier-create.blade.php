<form method="POST" action="{{ route('suppliers.store') }}" class="create-edit">
    @csrf
    <div>
        <label for="company">Наименование компании</label>
        <input type="text" name="company" id="company" value="{{ old('company') }}" required placeholder=" ">
    </div>
    <div>
        <label for="full-name">ФИО контактного лица</label>
        <input type="text" name="contact_name" id="full-name" value="{{ old('contact_name') }}" required 
               pattern="^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$" 
               title="Введите ФИО в формате: Фамилия Имя Отчество" placeholder=" ">
    </div>
    <div>
        <label for="number">Номер телефона</label>
        <input type="tel" name="number" id="number" value="{{ old('number') }}" required 
               pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" 
               title="Введите номер в формате: +7 (XXX) XXX-XX-XX" placeholder=" ">
    </div>
    <button type="submit">Создать</button>
</form>