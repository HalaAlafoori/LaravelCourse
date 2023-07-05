<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseAPIController
{
    //
    public  function  index()
    {
        $products = Product::with(['brand', 'categories'])->get();

        return $this->sendResponse($products) ;
    }
}
