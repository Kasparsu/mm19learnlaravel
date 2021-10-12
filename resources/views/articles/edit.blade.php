@extends('layout')
@section('title', 'Edit ' . $article->title)
@section('content')
    <form action="/admin/articles/{{$article->id}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="12" name="body">{{$article->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

