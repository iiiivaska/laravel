@extends('layouts.app')

@section('title-block')Все сообщения@endsection

@section('content')
    <h1>Главная страница</h1>
    @foreach($data as $element)
        <div class="alert alert-info">
            <h3>{{ $element->subject }}</h3>
            <p>{{ $element->email }}</p>
            <p>{{ $element->created_at }}</p>
        </div>
    @endforeach
@endsection

