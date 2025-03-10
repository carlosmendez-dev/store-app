<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->name = $request->name;
        $article->image = $request->image;
        $article->price = $request->price;
        $article->stock = $request->stock;
        $article->description = $request->description;
        $article->tag_id = $request->tag_id;
        $article->save();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->name = $request->name;
        $article->price = $request->price;
        $article->image = $request->image;
        $article->stock = $request->stock;
        $article->description = $request->description;
        $article->tag_id = $request->tag_id;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
