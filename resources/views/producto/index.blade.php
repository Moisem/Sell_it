@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
        @include('includes.message')
        </div>
        @include('includes.productos')
        <div class="clearfix"></div>
        {{$productos->links()}}
    </div>
</div>
@endsection

