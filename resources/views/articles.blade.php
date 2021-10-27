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

                            <p class="card-text">
                                <small class="text-muted">{{ $article->user->name }}</small><br>
                                <small class="text-muted">Created {{ $article->created_at->diffForHumans() }}</small><br>
                                <small class="text-muted">Updated {{ $article->updated_at->diffForHumans() }}</small><br>
                                <small class="text-muted">Comments: {{ $article->comments()->count() }}</small><br>
                                <small class="text-muted">Likes: {{ $article->likes()->count() }}</small><br>
                                <a href="/articles/{{$article->id}}/like">
                                    @if($article->isLiked)
                                        unlike
                                    @else
                                        like
                                    @endif
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $articles->links('partials.pagination') }}</div>
@endsection
