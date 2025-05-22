@foreach($hot as $category)
    @foreach($category->menu as $item)
    <tr class="menu-item">
        <td colspan="3"><h2>{{$item->name}}</h2></td>
    </tr>
    <tr class="menu-item-details">
        <td>
            @if($item->drinkimage)
            <div class="menu-item-image" style="background: url({{ asset('storage/'.$item->drinkimage->image_path) }}) no-repeat center center / cover;"></div>
            @endif
        </td>
        <td class="sizes">
            @if($item->drinksize)
                @foreach($item->drinksize as $size)
                   <p>{{ $size->size }}</p>
                   <p>{{ $sizeVolumes[$size->size] ?? 'Неизвестный размер' }}</p>
                   <p>{{ $size->price }} р</p>
                @endforeach
            @endif
        </td>
        <td>
            <form method="POST" action="{{ route('menu.item.delete', $item->id) }}" class="actions">
                <a href="{{ route('menu.item.edit', $item->id) }}" data-id="{{ $item->id }}" class="edit-item">Редактировать</a>
                <a href="{{ route('menu.item.toggle-status', $item->id) }}">
                    @if($item->status == 'active')
                        Отключить
                    @else
                        Включить
                    @endif
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Удалить</button>
            </form>
        </td>
    </tr>              
    @endforeach
@endforeach

@foreach($cold as $category)
    @foreach($category->menu as $item)
    <tr class="menu-item">
        <td colspan="3"><h2>{{$item->name}}</h2></td>
    </tr>
    <tr class="menu-item-details">
        <td>
            @if($item->drinkimage)
            <div class="menu-item-image" style="background: url({{ asset('storage/'.$item->drinkimage->image_path) }}) no-repeat center center / cover;"></div>
            @endif
        </td>
        <td class="sizes">
            @if($item->drinksize)
                @foreach($item->drinksize as $size)
                   <p>{{ $size->size }}</p>
                   <p>{{ $sizeVolumes[$size->size] ?? 'Неизвестный размер' }}</p>
                   <p>{{ $size->price }} р</p>
                @endforeach
            @endif
        </td>
        <td>
            <form method="POST" action="{{ route('menu.item.delete', $item->id) }}" data-id="{{ $item->id }}" class="actions">
                <a href="{{ route('menu.item.edit', $item->id) }}" data-id="{{ $item->id }}" class="edit-item">Редактировать</a>
                <a href="{{ route('menu.item.toggle-status', $item->id) }}">
                    @if($item->status == 'active')
                        Отключить
                    @else
                        Включить
                    @endif
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Удалить</button>
            </form>
        </td>
    </tr>
    @endforeach
@endforeach

@foreach($snacks as $category)
    @foreach($category->menu as $item)
    <tr class="menu-item">
        <td colspan="3"><h2>{{$categoryName[$category->name]}} {{$item->name}}</h2></td>
    </tr>
    <tr class="menu-item-details">
        <td colspan="2" style="font-size: 1.5em; width: 100%">{{$category->foodprice->price}} р</td>
        <td>
            <form method="POST" action="{{ route('menu.item.delete', $item->id) }}" class="actions">
                <a href="{{ route('menu.item.edit', $item->id) }}" data-id="{{ $item->id }}" class="edit-item">Редактировать</a>
                <a href="{{ route('menu.item.toggle-status', $item->id) }}">
                    @if($item->status == 'active')
                        Отключить
                    @else
                        Включить
                    @endif
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Удалить</button>
            </form>
        </td>
    </tr>
    @endforeach
@endforeach