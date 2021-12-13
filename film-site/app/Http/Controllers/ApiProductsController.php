<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Directors;
use App\Http\Resources\ApiProductsController as ApiProductResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;

class ApiProductsController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return ApiProductResource::collection($products);
    }

}
