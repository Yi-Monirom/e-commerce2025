<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(Request $request){
        return Article::creat([
            'author_id'=>$request->author_id,
            'title'=>$request->title
        ]);
    }
    public function audiences(Article $article){
        return $article->audiences;
    }
    
}
