<tr>
    <td>
        <a href="{{route('product.show',$row->id)}}"><strong> {{$row->name}}</strong></a>
        <p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
    </td>
    <td>
        <form action="{{route('cart.count.update')}}" method="POST">
    @csrf
   <input type="number" name="product_count" min="1" value="{{ $row->qty}}">
   <input type="submit" value="Update count">

    </form>
    </td>

    <td>${{$row->price}}</td>
    <td>${{$row->total}}</td>
</tr>
