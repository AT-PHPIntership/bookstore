<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryRepository as Category;

class CategoryController extends Controller
{
    /**
     * Category
     *
     * @var category
     */
    private $category;
    
    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryRepository $category category
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth.token')->except('index');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->category->all());
    }
}
