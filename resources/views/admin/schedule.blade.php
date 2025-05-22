@extends('layouts.admin')

@section('titlePage', 'Расписание')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/schedule.css') }}">
@endsection

@section('content')
<div class="tab">
    <!-- Вкладка просмотра расписания -->
    <div id="content-1" class="tab-content" style="display: {{ $section === 'schedule' ? 'flex' : 'none' }};">
        @if($hasSchedule)
            <div class="month-navigation">
                @if($prevMonth)
                    <a href="{{ route('schedule', ['section' => 'schedule', 'month' => $prevMonth]) }}" class="btn">&larr; Предыдущий</a>
                @endif
                
                <h2>{{ Str::ucfirst($currentDate->translatedFormat('F Y')) }}</h2>
                
                @if($nextAvailableMonth)
                    <a href="{{ route('schedule', ['section' => 'schedule', 'month' => $nextAvailableMonth]) }}" class="btn">Следующий &rarr;</a>
                @endif
            </div>
            
            @include('admin.partials.schedule-table', [
                'editMode' => false,
                'month' => $currentDate,
                'daysInMonth' => $daysInMonth,
                'schedules' => $schedules
            ])
        @else
            <p>Расписание на этот месяц не найдено</p>
        @endif
    </div>

    <!-- Вкладка управления расписанием -->
    <div id="content-2" class="tab-content" style="display: {{ $section === 'manage-schedule' ? 'flex' : 'none' }};">
        <div class="month-navigation">
            @if($prevMonth)
                <a href="{{ route('schedule', ['section' => 'manage-schedule', 'month' => $prevMonth]) }}" class="btn">&larr; Предыдущий</a>
            @endif
            
            <h2>{{ Str::ucfirst($currentDate->translatedFormat('F Y')) }}</h2>
            
            @if($nextAvailableMonth)
                <a href="{{ route('schedule', ['section' => 'manage-schedule', 'month' => $nextAvailableMonth]) }}" class="btn">Следующий &rarr;</a>
            @endif
            <a href="{{ route('schedule', ['section' => 'schedule', 'month' => $currentDate->format('Y-m')]) }}" class="btn">Вернуться к просмотру</a>
        </div>

        <!-- Выбор режима работы -->
        <div class="manage-mode-header">
            <div class="manage-mode-selector">
                <button type="button" class="mode-btn {{ !$hasNextSchedule ? 'active' : '' }}" data-mode="create">
                    Создать новое расписание
                </button>
                @if($canEdit)
                    <button type="button" class="mode-btn {{ $hasNextSchedule ? 'active' : '' }}" data-mode="edit">
                        Редактировать текущее
                    </button>
                @endif
            </div>
            
            <h2 id="current-operation-month">
                {{ $hasNextSchedule ? $currentMonthName : $nextMonthName }}
            </h2>
        </div>

        <!-- Форма для управления расписанием -->
        <form action="{{ route('schedule.store') }}" method="POST" id="schedule-form">
            @csrf
            <input type="hidden" name="month" id="schedule-month" value="{{ $hasNextSchedule ? $currentDate->format('Y-m') : $nextMonth->format('Y-m') }}">
            
            <!-- Контейнер для таблицы редактирования -->
            <div id="edit-schedule-container" style="display: {{ $hasNextSchedule ? 'block' : 'none' }};">
                @include('admin.partials.schedule-edit', [
                    'month' => $currentDate,
                    'daysInMonth' => $daysInMonth,
                    'schedules' => $schedules
                ])
            </div>
            
            <!-- Контейнер для таблицы создания -->
            <div id="create-schedule-container" style="display: {{ !$hasNextSchedule ? 'block' : 'none' }};">
                @include('admin.partials.schedule-edit', [
                    'month' => $nextMonth,
                    'daysInMonth' => $nextDaysInMonth,
                    'schedules' => $nextSchedules
                ])
            </div>
            
            <button type="submit" class="btn btn-primary">
                {{ $hasNextSchedule ? 'Сохранить изменения' : 'Сохранить расписание' }}
            </button>
        </form>
    </div>
    
    <!-- Навигация по вкладкам -->
    <div class="tab-nav">
        <div class="tab-btn">
            <a href="{{ route('schedule', ['section' => 'schedule', 'month' => $currentDate->format('Y-m')]) }}" 
               class="{{ $section === 'schedule' ? 'active' : ''}}">
               Расписание
            </a>
        </div>
        <div class="tab-btn">
            <a href="{{ route('schedule', ['section' => 'manage-schedule', 'month' => $currentDate->format('Y-m')]) }}" 
               class="{{ $section === 'manage-schedule' ? 'active' : ''}}">
               Управление расписанием
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // Переключение между режимами редактирования и создания
    $('.mode-btn').click(function() {
        const mode = $(this).data('mode');
        $('.mode-btn').removeClass('active');
        $(this).addClass('active');
        
        if(mode === 'edit') {
            $('#edit-schedule-container').show();
            $('#create-schedule-container').hide();
            $('#schedule-month').val('{{ $currentDate->format("Y-m") }}');
            $('button[type="submit"]').text('Сохранить изменения');
            $('#current-operation-month').text('{{ $currentMonthName }}');
        } else {
            $('#edit-schedule-container').hide();
            $('#create-schedule-container').show();
            $('#schedule-month').val('{{ $nextMonth->format("Y-m") }}');
            $('button[type="submit"]').text('Создать расписание');
            $('#current-operation-month').text('{{ $nextMonthName }}');
        }
    });

    // Обработка кликов по ячейкам
    $(document).on('click', '.editable-cell', function() {
        const $cell = $(this);
        const shifts = ['none', 'full-day', 'first-half', 'second-half'];
        const currentShift = $cell.data('shift');
        const nextIndex = (shifts.indexOf(currentShift) + 1) % shifts.length;
        const nextShift = shifts[nextIndex];
        
        // Обновляем данные и внешний вид
        $cell.data('shift', nextShift)
             .find('.shift-input').val(nextShift);
        
        updateCellAppearance($cell, nextShift);
    });

    function updateCellAppearance($cell, shift) {
        const color = $cell.data('color');
        
        $cell.removeClass('shift-none shift-full-day shift-first-half shift-second-half')
             .addClass('shift-' + shift)
             .css('--cell-color', color)
             .find('.shift-indicator').remove();
        
        if(shift == 'first-half') {
            $cell.append('<div class="shift-indicator first-half"></div>');
        } else if(shift == 'second-half') {
            $cell.append('<div class="shift-indicator second-half"></div>');
        }
    }
});
</script>
@endsection