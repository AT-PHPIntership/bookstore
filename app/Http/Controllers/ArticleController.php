<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ArticleRepository as Article;
use App\Http\Requests\ArticleRequest;

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
     * @param \Illuminate\Http\ArticleRequest $request hold data from request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->article->skip($request->skippedNumber)->take($request->takenNumber)->get());
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
