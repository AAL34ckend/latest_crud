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
        $articles = Article::orderBy('id', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'author' => 'required|string|',
            'title' => 'required|string|',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $image = $request->file('image')->store('assets', 'public');
        $data['image'] = $image;

        Article::create($data);
        return redirect()->route('articles.index')->with('message', 'Artikel berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($article)
    {
        $article = Article::findOrFail($article);
        return view('articles.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'author' => 'string',
            'title' => 'required|',
            'description' => 'required',
            'category' => 'required'
        ]);

        if ($request->image) {
            $image = $request->file('image')->store('assets/', 'public');
            $data['image'] = $image;
        } else {
            $article->image;
        }

        $article->update($data);
        return redirect()->route('articles.index', compact('article'))->with('update', 'Artikel Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('delete', 'Artikel berhasil dihapus');
    }
}
