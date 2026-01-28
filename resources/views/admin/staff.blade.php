@extends('layouts.admin')

@section('titlePage', 'Сотрудники')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/staff.css') }}">
@endsection

@section('content')
<div class="tab">
    
  <div class="tab-content" id="content-1" style="display: {{ $section === 'staff' ? 'grid' : 'none' }};">
    <div class="column">
        <table id="staff-table">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Дата рождения</th>
                </tr>
            </thead>

            <tbody id="staff-table-body">
                @include('admin.partials.staff-items')
            </tbody>
        </table>
    </div>

    <div id="form-container">
        @include('admin.partials.staff-create')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
</div>

  <div class="tab-nav">
    <div class="tab-btn">
        <a href="{{ route('staff', ['section' => 'staff']) }}" class="{{ $section === 'staff' ? 'active' : ''}}" id="tab-btn-1">Cотрудники</a>
    </div>
  </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function() {
   $(function() {
        // Инициализация при загрузке страницы
        initColorPicker();
        
        // Делегированная обработка для динамически появляющихся форм
        $(document).on('click', '.color-picker-toggle', function(e) {
            e.stopPropagation();
            $(this).next('.color-picker-dropdown').toggle();
        });
        
        $(document).on('click', '.color-option', function(e) {
            e.stopPropagation();
            const color = $(this).data('color');
            const $container = $(this).closest('.color-picker-container');
            
            $container.find('#selected_color').val(color);
            $container.find('.color-preview').css('background-color', color);
            $container.find('.selected-color-value').text(color);
            $container.find('.color-picker-dropdown').hide();
        });
        
        // Закрытие при клике вне пикера
        $(document).on('click', function() {
            $('.color-picker-dropdown').hide();
        });
        
        // Предотвращение закрытия при клике внутри пикера
        $(document).on('click', '.color-picker-dropdown', function(e) {
            e.stopPropagation();
        });
    });

    function initColorPicker() {
        $('.color-picker-container').each(function() {
            const $container = $(this);
            const $dropdown = $container.find('.color-picker-dropdown');
            const $toggle = $container.find('.color-picker-toggle');
            const $colorOptions = $container.find('.color-option');
            const $selectedColorInput = $container.find('#selected_color');
            const $colorPreview = $container.find('.color-preview');
            const $selectedColorValue = $container.find('.selected-color-value');
            
            // Обработчики для конкретного контейнера
            $toggle.off('click').on('click', function(e) {
                e.stopPropagation();
                $dropdown.toggle();
            });
            
            $colorOptions.off('click').on('click', function(e) {
                e.stopPropagation();
                const color = $(this).data('color');
                $selectedColorInput.val(color);
                $colorPreview.css('background-color', color);
                $selectedColorValue.text(color);
                $dropdown.hide();
            });
        });
    }
    

    // Обработка клика на Редактировать
    $(document).on('click', '.edit-employee', function(e) {
        e.preventDefault();
        const employeeId = $(this).data('id');

        const editUrl = "{{ route('staff.edit', ['id' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', employeeId);

        $.get(editUrl)
            .done(function(data) {
                $('#form-container').html(data);
                initColorPicker(); // Инициализируем color picker после загрузки формы
            })
            .fail(function(xhr) {
                console.error('Ошибка:', xhr.status, xhr.statusText);
                alert('Ошибка загрузки формы. Проверьте консоль для деталей.');
            });
    });
    
    
    
    // Отмена редактирования
    $(document).on('click', '#cancel-edit', function() {
        $.get("{{ route('staff.create-form') }}")
            .done(function(data) {
                const $form = $(data).find('#form-container').html();

                $('#form-container').html($form);
            });
    });

    // Маска для телефона
    $('#number').mask('+7 (000) 000-00-00');
    
    // Валидация ФИО
    $('#full_name').on('input', function() {
        const regex = /^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/;
        if (!regex.test($(this).val()) && $(this).val() !== '') {
            $(this).addClass('error');
        } else {
            $(this).removeClass('error');
        }
    });
;

});
</script>
@endsection