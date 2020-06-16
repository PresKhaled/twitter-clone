<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;

class TweetsController extends Controller
{
    public function store()
    {
        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => request()->validate([
                'tweet' => 'required|max:255'
            ])['tweet']
        ]);

        return redirect('discover');
    }
}
