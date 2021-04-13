@if (count($sus)>=3)
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach ($sus as $slider)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($sus as $slider)
        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
           <a href="{{route('producto.show', $slider->id)}}"><img class="img-carrusel" src="{{route('producto.image',['filename'=>$slider->image])}}" class="d-block w-100" alt="..."></a>
          </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@else
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach ($productos->take(4) as $producto)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($productos as $producto)
        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
            <img src="{{route('producto.image',['filename'=>$producto->image])}}" class="d-block w-100" alt="...">
          </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endif
