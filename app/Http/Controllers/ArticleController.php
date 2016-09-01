<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ArticleRepository as Article;

class ArticleController extends Controller
{
    /**
     * Artcile
     *
     * @var article
     */
    private $article;
    
    /**
     * Create a new ArticleRepository instance.
     *
     * @param ArticleRepository $article article
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->middleware('auth.token')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->article->with('city')->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id article id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->article->find($id));
    }
}
