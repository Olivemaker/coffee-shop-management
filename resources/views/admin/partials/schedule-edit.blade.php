<table class="schedule-table">
    <thead>
        <tr>
            <th>Сотрудник</th>
            @for($day = 1; $day <= $daysInMonth; $day++)
                <th>{{ $day }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $employee)
        <tr>
            <td>{{ $employee->full_name }}</td>
            @for($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $date = $month->copy()->day($day)->format('Y-m-d');
                    $dayPadded = str_pad($day, 2, '0', STR_PAD_LEFT);
                    $shift = Arr::get($schedules, "{$employee->id}.{$dayPadded}.0.shift", 'none');
                @endphp
                <td class="schedule-cell editable-cell shift-{{ $shift }}"
                    data-staff="{{ $employee->id }}"
                    data-date="{{ $date }}"
                    data-shift="{{ $shift }}"
                    data-color="{{ $employee->color }}"
                    style="{{ $shift !== 'none' ? '--cell-color: ' . $employee->color : '' }}">
                    <input type="hidden" 
                           name="schedule[{{ $employee->id }}][{{ $date }}]" 
                           value="{{ $shift }}" 
                           class="shift-input">
                    
                    @if($shift == 'first-half')
                        <div class="shift-indicator first-half"></div>
                    @elseif($shift == 'second-half')
                        <div class="shift-indicator second-half"></div>
                    @endif
                </td>
            @endfor
        </tr>
        @endforeach
    </tbody>
</table>