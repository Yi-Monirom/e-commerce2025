<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudienceController extends Controller
{
     public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt('123456'),
        ]);

        return Audience::create([
            'user_id' => $user->id,
            'name' => $request->name,
        ]);
    }

    public function subscribe(Request $request)
    {
        $audience = Audience::findOrFail($request->audience_id);
        $audience->articles()->attach($request->article_ids);

        return response()->json(['message' => 'Subscribed successfully']);
    }

    public function comments(Audience $audience)
    {
        return $audience->comments;
    }
}
