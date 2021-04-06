<h1>{{$membresia->tipo}}</h1>
<h2>{{$membresia->precio}}</h2>

<form action="{{route('guardar', $membresia)}}" method="POST">
    @csrf
    <button>Comprar</button>
</form>