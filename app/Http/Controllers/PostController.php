<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //metodo para listar todos los recursos GET
    public function index()
    {
        //return new PostResource(Post::find(1));
        return PostResource::collection(Post::all());
    }

    //metodo para hacer POST
    public function store(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->observation = $request->observation;
        $post->author_id = $request->author_id;

        /**
         * $author = new Author();
         * $author->name = $request->author['name'];
         * $author->lastname = $request->author['lastname'];
         * $author->birth_date = $request->author['birth_date'];
         * $author->save();
         * $post->author_id  = $author->id;
         */



        $post->save();
        return $post;
    }

    //obtener solo 1 recurso GET
    public function show(Post $post)
    {
        return new PostResource(Post::find($post->id));
    }

    //metodo para actualizar datos de un recurso UPDATE
    public function update(Post $post, Request $request)
    {

        $post = Post::find($post->id);
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->observation = $request->input('observation');
        $post->author_id = $request->input('author_id');
        $post->save();
        return $post;
    }


    //metodo para eliminar un recuso
    public function delete(Post $post)
    {

        $post = Post::find($post->id);
        $post->delete(); //delete the client

        return $post;
    }
}
