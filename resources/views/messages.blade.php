@extends('layouts.app')

@section('title-block')Все сообщения@endsection

@section('content')
    <h1>Сообщения</h1>
    @foreach($data as $element)
        <div class="alert alert-info">
            <h3>{{ $element->subject }}</h3>
            <p>{{ $element->email }}</p>
            <p>{{ $element->created_at }}</p>
            <a href="{{ route('contact-data-one', $element->id) }}"><button class = "btn btn-warning">Подробнее</button></a>
        </div>
    @endforeach
@endsection

