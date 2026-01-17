<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $resuest){
        $user = User::create([
            'name'=>$resuest->username,
            'email'=>$resuest->email,
            'password'=>bcrypt('123456')
        ]);
        $author = Author::create([
            'user_id'=>$user->id,
            'name'=>$resuest->name,
        ]);
        return respone()->json($author);
    }
    public function articles(Author $author){
        return $author->articles;
    }
    public function audiences(Author $author){
        return $author->audiences;
    }
}
