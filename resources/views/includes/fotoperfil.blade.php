@if(Auth::user()->image)
    <img src="{{ route('user.image',['filename'=>Auth::user()->image]) }}" class="image">
@endif