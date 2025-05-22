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
    function initColorPicker() {
        const $toggle = $('#colorPickerToggle');
        const $dropdown = $('#colorPickerDropdown');
        const $colorOptions = $('.color-option');
        const $selectedColorInput = $('#selected_color');
        const $colorPreview = $('.color-preview');
        const $selectedColorValue = $('.selected-color-value');
        
        // Удаляем старые обработчики, если они есть
        $toggle.off('click');
        $colorOptions.off('click');
        $dropdown.off('click');
        
        // Показать/скрыть dropdown
        $toggle.on('click', function(e) {
            e.stopPropagation();
            $dropdown.toggle();
        });
        
        // Выбор цвета
        $colorOptions.on('click', function(e) {
            e.stopPropagation();
            const color = $(this).data('color');
            $selectedColorInput.val(color);
            $colorPreview.css('background-color', color);
            $selectedColorValue.text(color);
            $dropdown.hide();
        });
        
        // Закрыть dropdown при клике вне его
        $(document).on('click', function() {
            $dropdown.hide();
        });
        
        // Предотвращаем закрытие при клике внутри dropdown
        $dropdown.on('click', function(e) {
            e.stopPropagation();
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