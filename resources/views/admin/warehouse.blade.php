@extends('layouts.admin')

@section('titlePage', 'Склад')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/warehouse.css') }}">
@endsection

@section('content')
<div class="tab">
  
  <!-- Склад -->
<div class="tab-content" id="content-1" style="display: {{ $section === 'warehouse' ? 'grid' : 'none' }};">

    <!-- Форма поиска -->
    <form class="search">
        <div>
            <label for="search">Поиск</label>
            <input type="text" name="search" placeholder=" ">
        </div>
    </form>

    <div class="column">
        <table>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody id="store-table-body">
                @foreach($store as $item)
                <tr data-id="{{ $item->id }}">
                    <td><p>{{ $item->name }}</p></td>
                    <td class="quantity"><p>{{ $item->current_quantity }} {{ $item->unit_measure }}</p></td>
                    <td>
                        <a href="{{ route('store-items.edit', $item->id) }}" class="edit-item" data-id="{{ $item->id }}">Редактировать</a>
                        <form method="POST" action="{{ route('store-items.delete', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Форма создания/редактирования -->
    <div id="store-item-form-container">
        @include('admin.partials.store-item-create')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <script>
    $(document).ready(function() {
        // Поиск без перезагрузки (AJAX)
        $('input[name="search"]').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#store-table-body tr').each(function() {
                const text = $(this).find('td:first p').text().toLowerCase();
                $(this).toggle(text.includes(searchTerm));
            });
        });

         // Обработка клика на "Редактировать"
        $(document).on('click', '.edit-item', function(e) {
            e.preventDefault();
            const itemId = $(this).data('id');
            
            // Используем route() Laravel для генерации правильного URL
            const editUrl = "{{ route('store-items.edit', ['id' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', itemId);
            
            $.get(editUrl)
                .done(function(data) {
                    $('#store-item-form-container').html(data);
                })
                .fail(function(xhr) {
                    console.error('Ошибка:', xhr.status, xhr.statusText);
                    alert('Ошибка загрузки формы. Проверьте консоль для деталей.');
                });
        });
        
        // Обработка отмены редактирования
        $(document).on('click', '#cancel-edit', function() {
            $('#store-item-form-container').html(`@include('admin.partials.store-item-create')`);
        });
    });
    </script>
</div>
  <!-- Инвентаризация -->
<div class="tab-content" id="content-2" style="display: {{ $section === 'inventory' ? 'grid' : 'none' }};">
    <form class="search">
        <div>
            <label for="search">Поиск по дате</label>
            <input type="date" name="search" placeholder=" ">
        </div>
    </form>

    <div class="column">
        <table>
            <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Количество</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody id="inventory-table-body">
                @foreach($inventory as $item)
                <tr>
                    <td><p>{{ $item->store->name }}</p></td>
                    <td class="quantity"><p>{{ $item->quantity }} {{ $item->store->unit_measure }}</p></td>
                    <td class="td-date">{{ $item->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form method="POST" action="{{ route('inventory.store') }}" class="create-edit">
        @csrf
        @foreach($store as $elem)
            <div class="product">
                <input type="hidden" name="items[{{ $elem->id }}][id_item]" value="{{ $elem->id }}">
                <label>Название</label>
                <input type="text" value="{{ $elem->name }}" readonly>
            </div>
            <div class="quantity">
                <label>Кол-во</label>
                <input type="number" name="items[{{ $elem->id }}][quantity]" required step="0.01">
            </div>
            <div class="unit-measure">
                <label>Ед. изм.</label>
                <input type="text" value="{{ $elem->unit_measure }}" readonly>
            </div>
        @endforeach
        <div>
            <label for="inventory-date">Дата инвентаризации</label>
            <input type="date" name="date" id="inventory-date" required>
        </div>
        <button type="submit">Сохранить</button>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>


    <script>
    $(document).ready(function() {
        // Поиск по дате (AJAX)
        $('input[name="search"]').on('change', function() {
            const searchDate = $(this).val();
            $.get('{{ route("inventory.search") }}', { date: searchDate }, function(data) {
                $('#inventory-table-body').html(data);
            });
        });
    });
    </script>
</div>

  <!-- Поставки -->
<div class="tab-content" id="content-3" style="display: {{ $section === 'delivery' ? 'grid' : 'none' }};">
    <form class="search">
        <div>
            <label for="search">Поиск по названию/поставщику</label>
            <input type="text" name="search" placeholder=" ">
        </div>
        <div>
            <label for="search-date">Поиск по дате</label>
            <input type="date" name="search-date" placeholder=" ">
        </div>
    </form>

    <div class="column">
        <table>
            <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Количество</th>
                    <th>Дата</th>
                    <th>Поставщик</th>
                </tr>
            </thead>
            <tbody id="delivery-table-body">
                @foreach($delivery as $item)
                <tr>
                    <td><p>{{ $item->store->name ?? 'Товар удален' }}</p></td>
                    <td  class="quantity"><p>{{ $item->quantity }} {{ $item->store->unit_measure ?? 'чет пусто' }}</p></td>
                    <td class="td-date">{{ $item->date }}</td>
                    <td>{{ $item->suppliers->company ?? 'никого' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form method="POST" action="{{ route('deliveries.store') }}" class="create-edit" id="delivery-form">
        @csrf
        <div class="delivery-items" id="delivery-items-container">
            <div class="delivery-item">
                <div>
                    <select name="items[0][id_item]" required>
                        <option value="">Выберите товар</option>
                        @foreach($store as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="item-quantity">Кол-во</label>
                    <input type="number" name="items[0][quantity]" id="item-quantity" placeholder=" " required step="0.01">
                </div>
                <div>
                    <select name="items[0][id_supplier]" required>
                        <option value="">Выберите поставщика</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->company }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="date" name="items[0][date]" required>
                </div>
            </div>
        </div>
        <a href="#" id="add-delivery-item">Добавить поставку</a>
        <button type="submit">Сохранить все</button>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>


    <script>
    $(document).ready(function() {
        // Поиск (AJAX)
        $('input[name="search"]').on('input', function() {
            const searchTerm = $(this).val();
            const date = $('input[name="search-date"]').val();
            
            $.get('{{ route("deliveries.search") }}', { q: searchTerm, date: date }, function(data) {
                $('#delivery-table-body').html(data);
            });
        });
        
        $('input[name="search-date"]').on('change', function() {
            const searchTerm = $('input[name="search"]').val();
            const date = $(this).val();
            
            $.get('{{ route("deliveries.search") }}', { q: searchTerm, date: date }, function(data) {
                $('#delivery-table-body').html(data);
            });
        });
        
        // Добавление новой строки поставки
        let itemCount = 1;
        $('#add-delivery-item').click(function() {
            const newItem = `
                <div class="delivery-item">
                    <hr>
                    <div>
                        <select name="items[${itemCount}][id_item]" required>
                            <option value="">Выберите товар</option>
                            @foreach($store as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Кол-во</label>
                        <input type="number" name="items[${itemCount}][quantity]" required step="0.01">
                    </div>
                    <div>
                        <select name="items[${itemCount}][id_supplier]" required>
                            <option value="">Выберите поставщика</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->company }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="date" name="items[${itemCount}][date]" required>
                    </div>

                </div>
            `;
            $('#delivery-items-container').append(newItem);
            itemCount++;
        });
    });
    </script>
</div>
<!-- Поставщики -->
<div class="tab-content" id="content-4" style="display: {{ $section === 'supplier' ? 'grid' : 'none' }};">
    <form class="search">
        <div>
            <label for="search">Поиск по названию компании</label>
            <input type="text" name="search" placeholder=" ">
        </div>
    </form>

    <div class="column">
        <table>
            <thead>
                <tr>
                    <th>Компания</th>
                    <th>Контактное лицо</th>
                    <th>Телефон</th>
                </tr>
            </thead>
            <tbody id="suppliers-table-body">
                @foreach($suppliers as $supplier)
                <tr data-id="{{ $supplier->id }}">
                    <td>{{ $supplier->company }}</td>
                    <td>{{ $supplier->contact_name }}</td>
                    <td>{{ $supplier->number }}</td>
                </tr>
                 <tr><td colspan="3" >
                        <form method="POST" action="{{ route('suppliers.delete', $supplier->id) }}" class="actions">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="edit-supplier" data-id="{{ $supplier->id }}">Редактировать</a>
                            <button type="submit" class="delete-btn">Удалить</button>
                        </form>
                    </td></tr>   
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="supplier-form-container">
        @include('admin.partials.supplier-create')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function() {
        // Поиск поставщиков (AJAX)
        $('input[name="search"]').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#suppliers-table-body tr').each(function() {
                const text = $(this).find('td:first').text().toLowerCase();
                $(this).toggle(text.includes(searchTerm));
            });
        });

        // Обработка клика на "Редактировать" поставщика
        $(document).on('click', '.edit-supplier', function(e) {
            e.preventDefault();
            const supplierId = $(this).data('id');

            const editUrl = "{{ route('suppliers.edit', ['id' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', supplierId);
            
            $.get(editUrl)
                .done(function(data) {
                    $('#supplier-form-container').html(data);
                })
                .fail(function(xhr) {
                    console.error('Ошибка:', xhr.status, xhr.statusText);
                    alert('Ошибка загрузки формы поставщика');
                });
        });
        
        // Обработка отмены редактирования поставщика
        $(document).on('click', '#cancel-edit-supplier', function() {
            $('#supplier-form-container').html(`@include('admin.partials.supplier-create')`);
        });
        
        // Маска для телефона
        $('#number').mask('+7 (000) 000-00-00');
        
        // Валидация ФИО
        $('#full-name').on('input', function() {
            const regex = /^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/;
            if (!regex.test($(this).val()) && $(this).val() !== '') {
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });
    });
    </script>
</div>
   
  <div class="tab-nav">
    <div class="tab-btn">
        <a href="{{ route('product-record', ['section' => 'warehouse']) }}" class="{{ $section === 'warehouse' ? 'active' : ''}}" id="tab-btn-1">Склад</a>
    </div>
    <div class="tab-btn">
        <a href="{{ route('product-record', ['section' => 'inventory']) }}" class="{{ $section === 'inventory' ? 'active' : ''}}" id="tab-btn-1">Инвентаризация</a>
    </div>
    <div class="tab-btn">
        <a href="{{ route('product-record', ['section' => 'delivery']) }}" class="{{ $section === 'delivery' ? 'active' : ''}}" id="tab-btn-1">Поставки</a>
    </div>
    <div class="tab-btn">
        <a href="{{ route('product-record', ['section' => 'supplier']) }}" class="{{ $section === 'supplier' ? 'active' : ''}}" id="tab-btn-1">Поставщики</a>
    </div>
  </div>
</div>



@endsection