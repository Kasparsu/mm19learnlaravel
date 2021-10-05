@extends('layout')
@section('title', $article->title)
@section('content')

                <div class="card">
                    {{--                    <img src="..." class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                    </div>
                </div>

@endsection
