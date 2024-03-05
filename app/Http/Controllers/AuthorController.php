<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->lastname = $request->lastname;
        $author->birth_date = $request->birth_date;

        $author->save();
        return $author;
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return Author::find($author->id);
    }

    public function getPostByAuthor(Author $author)
    {
        return new AuthorResource(Author::find($author->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $author = Author::find($author->id);
        $author->name = $request->input('name');
        $author->lastname = $request->input('lastname');
        $author->birth_date = $request->input('birth_date');

        $author->save();
        return $author;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Author $author)
    {
        $author = Author::find($author->id);
        $author -> delete();

        return $author;
    }
}
