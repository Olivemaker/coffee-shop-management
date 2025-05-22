@extends('layouts.admin')

@section('titlePage', 'Меню')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
@endsection


@section('content')

@php
    $categoryName = [
        'Hot' => 'Горячий напиток',
        'Cold' => 'Холодный напиток',
        'Sandwich' => 'Сэндвич',
        'Salad' => 'Салат',
        'Mochi' => 'Моти',
        'Donat' => 'Донат',
        'Cheesecake' => 'Чизкейк',
    ];

    $sizeVolumes = [
        'S' => '300мл',
        'M' => '400мл',
        'L' => '500мл',
    ];
@endphp

<div class="tab">
    <div class="tab-content" id="content-1" style="display: {{ $section === 'menu' ? 'grid' : 'none' }};">
        <!-- форма поиска -->
        <form class="search">
            <div>
                <label for="search">Поиск</label>
                <input type="text" name="search" id="menu-search" placeholder=" ">
            </div>
        </form>

        <!-- вывод всех позиций меню -->
        <div class="column">
            <table class="menu" id="menu-table">
                <tbody id="menu-table-body">
                    @include('admin.partials.menu-items', ['hot' => $hot, 'cold' => $cold, 'snacks' => $snacks])
                </tbody>
            </table>
        </div>

        <!-- форма управления меню -->
        <div id="menu-form-container">
            @include('admin.partials.menu-item-create')

        </div>
    </div>

    <div class="tab-content" id="content-2" style="display: {{ $section === 'sesonal-offers' ? 'grid' : 'none' }};">
        <div class="column">
            @foreach($sesonalOffers as $offer)
            <div class="marketing" id="{{$offer->style}}">
                <h3>{{$offer->title}}</h3>
                <form class="actions">
                    <a href="#" class="edit-offer" data-id="{{ $offer->id }}">Редактировать</a>
                    <a href="{{ route('menu.offer.publish', $offer->id) }}">
                        {{ $offer->published ? 'Снять с публикации' : 'Опубликовать' }}
                    </a>
                </form>
                <div>
                    <p>{{$offer->description}}</p>
                </div>
                <div class="img-offers" style="background: url({{ $offer->image_path ? asset('storage/'.$offer->image_path) : asset('images/default-offer.jpg') }}) no-repeat center center / cover; border-radius: 12px;"></div>
            </div>
            @endforeach
        </div>

        <form class="create-edit" method="POST" action="#" id="offer-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="offer_id" id="offer_id" value="">
            
            <div>
                <label for="title">Название</label>
                <input type="text" name="title" id="title" placeholder=" " disabled>
            </div>
            
            <div>
                <label for="description">Описание</label>
                <textarea name="description" id="description" placeholder=" " disabled></textarea>
            </div>
            
            <div id="image-fields">
                <label for="image">Загрузить изображение</label>
                <input type="file" name="image" id="image-offer" accept="image/*" disabled>
                <div class="preview" id="preview2">
                    <img id="image-preview" class="image-preview" 
                         src="{{ asset('images/icons/download.png') }}" 
                         alt="Предпросмотр изображения">
                </div>
            </div>
            
            <button type="submit" disabled>Сохранить</button>
            <button type="button" id="cancel-edit" style="display: none;">Отмена</button>
        @if(session('success'))
        <p>{{session('success')}}</p>
        @endif
        @if(session('success-image'))
        <p>{{session('success-image')}}</p>
        @endif
        </form>

    </div>

    <!-- вкладки -->
    <div class="tab-nav">
        <div class="tab-btn">
            <a href="{{ route('menu', ['section' => 'menu']) }}" class="{{ $section === 'menu' ? 'active' : ''}}" id="tab-btn-1">Меню</a>
        </div>
        <div class="tab-btn">
            <a href="{{ route('menu', ['section' => 'sesonal-offers']) }}" class="{{ $section === 'sesonal-offers' ? 'active' : ''}}" id="tab-btn-2">Акции</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Поиск в меню
        $('#menu-search').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            // Группируем строки по две (название + детали)
            const $rows = $('#menu-table-body tr');
            for (let i = 0; i < $rows.length; i += 2) {
                const $nameRow = $($rows[i]);
                const $detailsRow = $($rows[i+1]);
                const nameText = $nameRow.find('h2').text().toLowerCase();
                const match = nameText.includes(searchTerm);
                
                $nameRow.toggle(match);
                $detailsRow.toggle(match);
            }
        });

        // Обработка выбора категории
        $('#category-select').change(function() {
            const selectedCategory = $(this).find('option:selected').data('category');
            
            // Скрываем все поля
            $('#common-fields, #price-field, .size-fields, #image-fields').hide();

            if (selectedCategory === 'Hot' || selectedCategory === 'Cold') {
                // Отображаем поля для горячих и холодных напитков
                $('#common-fields').show();
                $('.size-fields').show();
                $('#image-fields').show();
            } else if (['Sandwich', 'Mochi', 'Donat', 'Salad', 'Cheesecake'].includes(selectedCategory)) {
                // Отображаем только имя и цену
                $('#common-fields').show();
                $('#price-field').show();
            }
        });

        // обработка клика на Редактировать элемент меню
        $(document).on('click', '.edit-item', function(e) {
            e.preventDefault();
            const itemId = $(this).data('id');
            $('#image-menu').val('');
            
            // Используем route() Laravel для генерации правильного URL
            const editUrl = "{{ route('menu.item.edit', ['id' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', itemId);
            
            $.get(editUrl)
                .done(function(data) {
                    $('#menu-form-container').html(data);
                })
                .fail(function(xhr) {
                    console.error('Ошибка:', xhr.status, xhr.statusText);
                    alert('Ошибка загрузки формы. Проверьте консоль для деталей.');
                });
        });        
        
        // Предпросмотр изображения перед загрузкой
        $(document).on('change', '#image-menu', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview1 img').attr('src', e.target.result);  // Убедитесь, что #preview1 существует!
                };
                reader.readAsDataURL(file);
            }
        });
        

        // Отмена редактирования
        $(document).on('click', '#cancel-edit', function() {
            $.get("{{ route('menu', ['section' => 'menu']) }}", function(data) {
                const $form = $(data).find('#form-container').html();
                $('#menu-form-container').html($form);
            });
        });
    });

// скрипты обработки формы сезонных предложений 
 $(document).ready(function() {
    // Активация формы при редактировании
    $(document).on('click', '.edit-offer', function(e) {
        e.preventDefault();
        const offerId = $(this).data('id');
        
        // Получаем данные предложения
        const offer = {
            id: offerId,
            title: $(this).closest('.marketing').find('h3').text(),
            description: $(this).closest('.marketing').find('p').text(),
            image: $(this).closest('.marketing').find('.img-offers').css('background-image')
        };
        
        // Активируем и заполняем форму
        $('#offer-form').attr('action', "{{ route('menu.offer.update', '') }}/" + offerId);
        $('#offer_id').val(offerId);
        $('#title').val(offer.title).prop('disabled', false);
        $('#description').val(offer.description).prop('disabled', false);
        $('#image-offer').prop('disabled', false);
        $('button[type="submit"]').prop('disabled', false);
        $('#cancel-edit').show();
        
        // Устанавливаем текущее изображение
        if(offer.image && offer.image !== 'none') {
            $('#preview2 img').attr('src', offer.image.match(/url\(['"]?(.*?)['"]?\)/i)[1]);
        }
    });

    // Предпросмотр изображения перед загрузкой
    $('#image-offer').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview2 img').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });


    // Отмена редактирования
    $('#cancel-edit').on('click', function() {
        $('#offer-form').attr('action', '#').trigger('reset');
        $('#offer_id').val('');
        $('#title, #description, #image-offer').prop('disabled', true);
        $('button[type="submit"]').prop('disabled', true);
        $('#cancel-edit').hide();
        $('#preview2 img').attr('src', "{{ asset('images/icons/download.png') }}");
    });
});

</script>
@endsection