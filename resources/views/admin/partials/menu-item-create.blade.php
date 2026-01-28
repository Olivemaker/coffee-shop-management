<form class="create-edit" method="POST" action="{{ route('menu.item.store') }}" enctype="multipart/form-data">
    @csrf

    @if($errors->any())
        <div>
            <span style="color: red; font-weight: 600">{{ $errors->first() }}</span>
        </div>
    @endif

    <div>
        <select id="category-select" name="category_id" required>
            <option value="">Тип позиции меню</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" data-category="{{$category->name}}">{{$categoryName[$category->name]}}</option>
            @endforeach
        </select>
    </div>
    <div id="common-fields" style="display: none;">
        <label for="name">Название</label>
        <input type="text" name="name" id="name" placeholder=" " required>
    </div>
    <div id="price-field" style="display: none;">
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" placeholder=" " min="0" required>
        <span>При указании цены стоимость всей категории изменится</span>
    </div>
    <div class="size-fields" style="display: none;">
        <label for="price-s">Цена S</label>
        <input type="number" name="price_s" id="price-s" placeholder=" " min="0" required>
    </div>
    <div class="size-fields" style="display: none;">
        <label for="price-m">Цена M</label>
        <input type="number" name="price_m" id="price-m" placeholder=" " min="0" required>
    </div>
    <div class="size-fields" style="display: none;">
        <label for="price-l">Цена L</label>
        <input type="number" name="price_l" id="price-l" placeholder=" " min="0" required>
    </div>
    <div id="image-fields" style="display: none;">
        <label for="image">Загрузить изображение</label>
        <input type="file" name="image" id="image-menu" accept="image/*" required>
        <div class="preview" id="preview1">
            <img id="image-preview" class="image-preview" src="{{ asset('images/icons/download.png') }}" alt="Предпросмотр изображения">
        </div>
    </div>  
    <button type="submit">Сохранить</button>
</form>

