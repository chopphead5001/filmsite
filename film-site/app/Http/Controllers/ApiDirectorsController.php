<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Directors;
use App\Http\Resources\ApiDirectorsController as ApiDirectorsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;

class ApiDirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Directors::all();

        return ApiDirectorsResource::collection($directors);
    }

}