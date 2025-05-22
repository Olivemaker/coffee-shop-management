@foreach($inventory as $item)
<tr>
    <td><p>{{ $item->store->name }}</p></td>
    <td><p>{{ $item->current_quantity }} {{ $item->store->unit_measure }}</p></td>
    <td>{{ $item->date }}</td>
</tr>
@endforeach