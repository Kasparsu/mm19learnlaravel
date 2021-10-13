@extends('layout')
@section('title', $article->title)
@section('content')
                <a class="btn btn-primary my-3" href="{{url()->previous()}}">Back</a>
                <div class="card">
                    @if($article->image_path)
                        <img src="{{ $article->image_path }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                    </div>
                </div>

@endsection
