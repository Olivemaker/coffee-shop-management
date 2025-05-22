<form class="create-edit" method="POST" action="{{ route('staff.store') }}" id="staff-create-form">
    @csrf
    <div>
        <label for="full_name">Имя Фамилия</label>
        <input type="text" name="full_name" id="full_name" placeholder=" " required>
    </div>
    <div>
        <label for="number">Телефон</label>
        <input type="text" name="number" id="number" placeholder=" " required>
    </div>
    <div>
        <label for="address">Адрес проживания</label>
        <input type="text" name="address" id="address" placeholder=" " required>
    </div>
    <div>
        <label for="bday">Дата рождения</label>
        <input type="date" name="bday" id="bday" placeholder=" " required>
    </div>
    
    <div class="form-group color-picker-container">
        <label for="employee_color">Цвет сотрудника</label>
        <input type="hidden" name="color" id="selected_color" value="#3b82f6">
        
        <div class="color-picker-toggle" id="colorPickerToggle">
            <span class="color-preview" style="display: inline-block; width: 20px; height: 20px; 
                  border-radius: 50%; background-color: #3b82f6;"></span>
            <span class="selected-color-value">#3b82f6</span>
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
</form>