@extends('layouts.admin')

@section('titlePage', 'Финансовый учет')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/finance.css') }}">
@endsection

@section('content')
<div class="tab">
    <div class="tab-content" id="content-1" style="display: {{ $section === 'finance' ? 'grid' : 'none' }};">
        <!-- Форма поиска -->
        <form class="search" id="finance-search">
            <div>
                <label for="search-date">Поиск по дате</label>
                <input type="date" name="search-date" id="search-date">
            </div>
        </form>

        <div class="column">
            <table>
                <thead>
                    <tr>
                        <th>Тип</th>
                        <th>Сумма</th>
                        <th colspan="2">Описание</th>
                        <th>Дата операции</th>
                    </tr>
                </thead>
                <tbody id="finance-table-body">
                    @include('admin.partials.finance_table', ['operations' => $finance])
                </tbody>
            </table>
        </div>

        <!-- Форма создания операций -->
        <form method="POST" action="{{ route('financial-operations.store') }}" class="create-edit" id="finance-create-form">
            @csrf
            <div id="operations-container">
                <!-- Первая группа полей -->
                <div class="operation-group">
                    <div>
                        <select name="operations[0][type]" required>
                            <option value="">Тип операции</option>
                            <option value="выручка">Выручка</option>
                            <option value="такси">Такси</option>
                            <option value="ЗП">ЗП</option>
                            <option value="поставка">Поставка</option>
                        </select>
                    </div>
                    <div>
                        <select name="operations[0][payment_method]" required>
                            <option value="">Тип оплаты</option>
                            <option value="наличные">Наличные</option>
                            <option value="карта">Карта</option>
                        </select>
                    </div>
                    <div>
                        <label>Сумма</label>
                        <input type="number" name="operations[0][amount]" step="0.01" min="0" required placeholder=" ">
                    </div>
                    <div>
                        <label>Дата операции</label>
                        <input type="date" name="operations[0][date]" required>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <a href="#" id="add-operation">Добавить операцию</a>
                <button type="submit">Сохранить все</button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
  
    <div class="tab-nav">
        <div class="tab-btn">
            <a href="{{ route('finance-record', ['section' => 'finance']) }}" class="{{ $section === 'finance' ? 'active' : ''}}">Финансовый учет</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Поиск по дате
    $('#search-date').change(function() {
        const date = $(this).val();
        
        $.get('{{ route("financial-operations.search") }}', { 'search-date': date }, function(data) {
            $('#finance-table-body').html(data);
        });
    });

    // Добавление новой группы полей
    let operationCount = 1;
    $('#add-operation').click(function(e) {
        e.preventDefault();
        
        const newGroup = `
            <div class="operation-group">
                <hr>
                <div>
                    <select name="operations[${operationCount}][type]" required>
                        <option value="">Тип операции</option>
                        <option value="выручка">Выручка</option>
                        <option value="такси">Такси</option>
                        <option value="ЗП">ЗП</option>
                        <option value="поставка">Поставка</option>
                    </select>
                </div>
                <div>
                    <select name="operations[${operationCount}][payment_method]" required>
                        <option value="">Тип оплаты</option>
                        <option value="наличные">Наличные</option>
                        <option value="карта">Карта</option>
                    </select>
                </div>
                <div>
                    <label>Сумма</label>
                    <input type="number" name="operations[${operationCount}][amount]" step="0.01" min="0" required placehoder=" ">
                </div>
                <div>
                    <label>Дата операции</label>
                    <input type="date" name="operations[${operationCount}][date]" required>
                </div>

            </div>
        `;
        
        $('#operations-container').append(newGroup);
        operationCount++;
    });

    // Установка текущей даты по умолчанию
    $('input[name^="operations"][name$="[date]"]').val(new Date().toISOString().substr(0, 10));
});
</script>

@endsection