<?php

namespace App\Http\Controllers;

use App\newsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        if ($email == null) {
          return "noEmail";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return "invalidEmail";
        }
        if (newsLetter::where('email','=',$email)->exists()) {
          return "exists";
        }
        $newsLetter = new newsLetter;
        $newsLetter->email = $email;
        $newsLetter->createdAt  = date('Y-m-d H:i:s');
        $newsLetter->save();
        return "true";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\newsLetter  $newsLetter
     * @return \Illuminate\Http\Response
     */
    public function show(newsLetter $newsLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\newsLetter  $newsLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(newsLetter $newsLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\newsLetter  $newsLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newsLetter $newsLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\newsLetter  $newsLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(newsLetter $newsLetter)
    {
        //
    }
}
