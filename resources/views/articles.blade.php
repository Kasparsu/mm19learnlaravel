@extends('layout')
@section('title', 'Home page')
@section('content')

        <div>{{ $articles->links('partials.pagination') }}</div>
        <div class="row row-cols-4 mt-3">
            @foreach($articles as $article)
                <div class="col mb-3">
                    <div class="card">
    {{--                    <img src="..." class="card-img-top" alt="...">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->excerpt }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $articles->links('partials.pagination') }}</div>
@endsection
