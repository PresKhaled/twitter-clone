<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    //use \App\Followable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $username)
    {
        $user = User::where('username', $username)->first();
        return view('profile.profile', [
            'user' => $user,
            'tweets' => $user->tweets()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function edit($username)// Wrong, do sql query to fetch the user via username (Done) - will check this in Laravel 7
    {
        $user = User::where('username', $username)->first();
        
        abort_if(auth()->user()->isNot($user), 403);

        return view('profile.edit', compact($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
