<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CityRepository as City;

class CityController extends Controller
{
    /**
     * City
     *
     * @var city
     */
    private $city;
    
    /**
     * Create a new CityRepository instance.
     *
     * @param CityRepository $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
        $this->middleware('auth.token', ['except' => [
            'index',
            'show',
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->city->all());
    }
}
