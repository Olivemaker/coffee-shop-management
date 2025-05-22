@foreach($operations as $operation)
<tr>
    <td class="symbol-operation">
        @if($operation->type === 'выручка')
        <span class="symbol-plus"></span>
        @else
        <span class="symbol-minus"></span>
        @endif
    </td>
    <td>{{ $operation->amount }} р</td>
    <td class="td-descriotion">{{ $operation->type }}</td>
    <td>{{ $operation->payment_method }}</td>
    <td class="td-date">{{ $operation->date }}</td>
</tr>
@endforeach