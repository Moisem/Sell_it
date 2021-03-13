@extends('layouts.app')
@section('content')
    <h3>{{$producto->user->name}}</h3>
    <br>{{$producto->nombre}}
@endsection