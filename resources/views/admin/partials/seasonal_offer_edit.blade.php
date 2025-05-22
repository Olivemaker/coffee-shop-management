<form method="POST" action="{{ route('seasonal-offers.update', $offer->id) }}" class="create-edit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Название</label>
        <input type="text" name="title" id="title" value="{{ $offer->title }}" required>
    </div>
    <div>
        <label for="description">Описание</label>
        <textarea name="description" id="description" required>{{ $offer->description }}</textarea>
    </div>
    <div>
        <label for="image">Изображение</label>
        <input type="file" name="image" id="image-offer" accept="image/*">
        <div class="preview" id="preview2">
            <img class="image-preview" src="{{ $offer->image_path ? asset('storage/'.$offer->image_path) : asset('images/icons/download.png') }}" alt="Предпросмотр">
        </div>
    </div>
    <button type="submit">Сохранить</button>
    <a href="{{ route('seasonal-offers.publish', $offer->id) }}" class="publish-offer">
        {{ $offer->is_published ? 'Снять с публикации' : 'Опубликовать' }}
    </a>
</form>