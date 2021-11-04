@extends('layouts.app')

@section('title','Obras')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
@endsection

@section('content')
    <div class="mt-2">
        @livewire('obras.show')
    </div>
@endsection


