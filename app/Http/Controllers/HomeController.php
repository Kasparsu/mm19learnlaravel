<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('index');
    }

    public function articles(){
        $articles = Article::all();
        return view('articles', compact('articles'));
    }
}
