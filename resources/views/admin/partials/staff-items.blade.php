@foreach($staff as $employee)
<tr>
    <td>{{$employee->full_name}}</td>
    <td>{{$employee->number}}</td>
    <td>{{$employee->address}}</td>
    <td>{{$employee->bday}}</td>
</tr>
<tr>
    <td colspan="2">
        <div style="background: {{$employee->color}}; width:100%; aspect-ratio: 10/1;"></div>
    </td>
    
    <td colspan="2">
        <form class="actions" method="POST" action="{{ route('staff.destroy', $employee->id) }}">
            <a href="{{ route('staff.edit', $employee->id) }}" class="edit-employee" data-id="{{ $employee->id }}">Редактировать</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Удалить</button>
        </form>
    </td> 
</tr>
@endforeach