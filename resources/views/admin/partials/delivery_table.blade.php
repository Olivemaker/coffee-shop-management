@foreach($deliveries as $del)
<tr>
    <td><p>{{ $del->store->name }}</p></td>
    <td><p>{{ $del->current_quantity }} {{ $del->store->unit_measure }}</p></td>
    <td>{{ $del->date }}</td>
    <td>{{ $del->suppliers->company }}</td>
</tr>
@endforeach