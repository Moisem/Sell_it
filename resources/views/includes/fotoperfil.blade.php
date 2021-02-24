@if(Auth::user()->image)
    <div class="container-image">
        <img src="{{ route('user.image',['filename'=>Auth::user()->image]) }}" class="image">
    </div>
@endif