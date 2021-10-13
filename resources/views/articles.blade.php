@extends('layout')
@section('title', 'Articles')
@section('content')

        <div>{{ $articles->links('partials.pagination') }}</div>
        <div class="row row-cols-4 mt-3">
            @foreach($articles as $article)
                <div class="col mb-3">
                    <div class="card">
                        @if($article->image_path)
                            <img src="{{ $article->image_path }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->excerpt }}</p>
                            <a href="{{ route( 'article', ['article'=> $article->id] ) }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $articles->links('partials.pagination') }}</div>
@endsection
