<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ArticleRepository as Article;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use App\Http\Requests\Rules\ArticleRule;
use Image;

class ArticleController extends Controller
{
    /**
     * Artcile
     *
     * @var article
     */
    private $article;
    
    /**
     * Image
     *
     * @var image
     */
    private $image;
    
    /**
     * Create a new ArticleRepository instance.
     *
     * @param ArticleRepository $article article
     * @param ImageRepository   $image   image
     *
     * @return void
     */
    public function __construct(Article $article, ImageRepository $image)
    {
        $this->article = $article;
        $this->image = $image;
        $this->middleware('auth.token', ['except' => [
            'index',
            'show',
        ]]);
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
        return response()->json($this->article->with('images')->skip($request->skippedNumber)->take($request->takenNumber)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug article slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return response()->json($this->article->with('user')->findBy('slug', $slug)->first());
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = ArticleRule::creatingValidator($request->all());
        if ($validator->passes()) {
            $request['slug'] = str_slug($request->title.time());
            $request['user_id'] = JWTAuth::toUser()->id;
            $newArticle = $this->article->create($request->only(
                'title',
                'description',
                'type',
                'price',
                'slug',
                'category_detail_id',
                'city_id',
                'user_id'
            ));
            collect(collect($request->files)->first())->each(function ($item, $key) use ($request, $newArticle) {
                $fileName = $request->slug.'-'.$key.'.'.$item->getClientOriginalExtension();
                Image::make($item)->fit(
                    \Config::get('common.IMAGE_ARTICLE_WIDTH'),
                    \Config::get('common.IMAGE_ARTICLE_HEIGHT')
                )->save(\Config::get('common.IMAGE_PATH').'/'.$fileName);
                $this->image->create(['name' => $fileName, 'article_id' => $newArticle->id]);
            });
            return response()->json([
                'success' => true,
                'message' => trans('common.success')
            ], \Config::get('http_response_code.200_OK'));
        }
        $errors = json_decode($validator->errors());
        return response()->json([
            'success' => false,
            'message' => $errors
        ], \Config::get('http_response_code.422_UNPROCESSABLE_ENTITY'));
    }
}
