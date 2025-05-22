<form class="create-edit" method="POST" action="{{ route('staff.update', $employee->id) }}" id="staff-edit-form">
    @csrf
    @method('PUT')
    <div>
        <label for="full_name">Имя Фамилия</label>
        <input type="text" name="full_name" id="full_name" value="{{ $employee->full_name }}" placeholder=" " required>
    </div>
    <div>
        <label for="number">Телефон</label>
        <input type="text" name="number" id="number" value="{{ $employee->number }}" placeholder=" " required>
    </div>
    <div>
        <label for="address">Адрес проживания</label>
        <input type="text" name="address" id="address" value="{{ $employee->address }}" placeholder=" " required>
    </div>
    <div>
        <label for="bday">Дата рождения</label>
        <input type="date" name="bday" id="bday" value="{{ $employee->bday }}" placeholder=" " required>
    </div>
    
    <div class="form-group color-picker-container">
        <label for="employee_color">Цвет сотрудника</label>
        <input type="hidden" name="color" id="selected_color" value="{{ $employee->color }}">
        
        <div class="color-picker-toggle" id="colorPickerToggle">
            <span class="color-preview" style="display: inline-block; width: 20px; height: 20px; 
                  border-radius: 50%; background-color: {{ $employee->color }};"></span>
            <span class="selected-color-value">{{ $employee->color }}</span>
            <span class="dropdown-arrow">▼</span>
        </div>
        
        <div class="color-picker-dropdown" id="colorPickerDropdown" style="display: none;">
            <div class="color-options-grid">
                @foreach([
                    '#ff7b7b', '#ffb27b', '#d57bff', '#937bff', '#6366f1',
                    '#ec4899', '#14b8a6', '#f97316', '#8b5cf6', '#64748b'
                ] as $color)
                    <div class="color-option" data-color="{{ $color }}" 
                         style="background-color: {{ $color }}"></div>
                @endforeach
            </div>
        </div>
    </div>
    
    <button type="submit">Сохранить</button>
    <button type="button" id="cancel-edit">Отмена</button>
</form>