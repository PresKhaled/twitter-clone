<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FollowsController extends Controller
{
    /**
     * Store a newly created resource in storage or delete existing one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($targetUsername)
    {
        auth()->user()->toggleFollow(
            User::where('username', $targetUsername)->first()->id
        );

        return back();
    }
}
