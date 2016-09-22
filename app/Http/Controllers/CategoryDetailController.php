<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryDetailRepository as CategoryDetail;

class CategoryDetailController extends Controller
{
    /**
     * CategoryDetail
     *
     * @var categoryDetail
     */
    private $categoryDetail;
    
    /**
     * Create a new CategoryDetailRepository instance.
     *
     * @param CategoryDetailRepository $categoryDetail categoryDetail
     *
     * @return void
     */
    public function __construct(CategoryDetail $categoryDetail)
    {
        $this->categoryDetail = $categoryDetail;
        $this->middleware('auth.token')->except('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryDetail = $this->categoryDetail->with('category')->all();
        if ($categoryDetail) {
            return response()->json($categoryDetail, \Config::get('http_response_code.200_OK'));
        }
        return response()->json([
            'success' => false
        ], \Config::get('http_response_code.422_UNPROCESSABLE_ENTITY'));
    }
}
