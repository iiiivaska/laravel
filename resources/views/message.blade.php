@extends('layouts.app')

@section('title-block'){{ $data->subject }}@endsection

@section('content')
    <h1>{{ $data->subject }}</h1>
    <div class="alert alert-info">
        <h3>{{ $data->message }}</h3>
        <p>{{ $data->email }}</p>
        <p>{{ $data->created_at }}</p>
        <a href="{{ route('contact-update', $data->id) }}"><button class = "btn btn-primary">Редактировать</button></a>
    </div>
@endsection

