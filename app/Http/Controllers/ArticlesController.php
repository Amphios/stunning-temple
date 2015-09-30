<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Show all articles
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show specific article
     * @param $id
     * @return \Illuminate\View\View
     */

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Create an article
     * @return \Illuminate\View\View
     */

    public function create()
    {
        return view('articles.create');
    }

    /**
     * Saves the article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(ArticleRequest $request)
    {
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        // Article::create($request->all());

        return redirect('articles');
    }

    /**
     * Edit article
     * @param $id
     * @return \Illuminate\View\View
     */

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update article
     * @param                      $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update($id, ArticleRequest $request)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
