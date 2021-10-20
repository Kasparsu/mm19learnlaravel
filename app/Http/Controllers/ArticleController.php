<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('article.owner.check')->except(['index', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Auth::user()->articles()->paginate();
        return response()->view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {

        $article = new Article($request->validated());
        $article->user_id = Auth::user()->id;
//        $article->title = $request->input('title');
//        $article->body = $request->input('body');
        $article->save();
        return response()->redirectToRoute('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return response()->view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $article->fill($request->validated());
//        $article->title = $request->input('title');
//        $article->body = $request->input('body');
        $article->save();
        return response()->redirectToRoute('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->redirectToRoute('articles.index');
    }
}
