@if($producto->image)
        <img src="{{route('producto.image',['filename'=>$producto->image])}}">
@endif