@extends('layout')
@section('title', 'Articles')
@section('content')
    <a class="btn btn-primary" href="/admin/articles/create">New Article</a>
    <div>{{ $articles->links() }}</div>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>{{$article->updated_at}}</td>
                        <td>
                            <a class="btn btn-primary">view</a>
                            <a class="btn btn-warning">edit</a>
                            <a class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>{{ $articles->links() }}</div>
@endsection
