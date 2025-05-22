

<form class="create-edit" method="POST" action="{{ route('menu.item.update', $item->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $item->id }}">

    <div>
        <select id="category-select" name="category_id" disabled>
            <option value="{{ $item->category_id }}" selected>{{ $categoryName[$item->category->name] }}</option>
        </select>
    </div>
    <div id="common-fields">
        <label for="name">Название</label>
        <input type="text" name="name" id="name" value="{{ $item->name }}" placeholder=" " required>
    </div>
    
    @if(in_array($item->category->name, ['Hot', 'Cold']))
            @foreach($item->drinksize as $size)
        <div class="size-fields">
                <label for="price-{{ strtolower($size->size) }}">Цена {{ $size->size }}</label>
                <input type="number" name="price_{{ strtolower($size->size) }}" id="price-{{ strtolower($size->size) }}" 
                       value="{{ $size->price }}" placeholder=" " min="0">
        </div>
            @endforeach
        <div id="image-fields">
            <label for="image">Загрузить изображение</label>
            <input type="file" name="image" id="image-menu" accept="image/*">
            <div class="preview" id="preview1">
                <img id="image-preview" class="image-preview" 
                     src="{{ asset('storage/'.$item->drinkimage->image_path) }}" 
                     alt="Предпросмотр изображения">
            </div>
        </div>
    @else
        <div id="price-field">
            <label for="price">Цена</label>
            <input type="number" name="price" id="price" 
                   value="{{ $item->category->foodprice->price }}" placeholder=" " min="0">
            <span>При указании цены стоимость всей категории изменится</span>
        </div>
    @endif
    
    <button type="submit">Сохранить</button>
    <button type="button" id="cancel-edit">Отмена</button>
</form>