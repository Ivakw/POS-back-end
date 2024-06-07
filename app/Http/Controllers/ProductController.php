<?php

namespace App\Http\Controllers;

use ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function create(ProductRequest $request){ return ProductService::create($request); }

    public function list(){ return ProductService::list(); }

    public function show($pro_id){ return ProductService::showProduct($pro_id); }

    public function delete($id){ return ProductService::delete($id); }

    public function update(Request $request, $id){ return ProductService::updateProduct($request, $id); }

    public function statusUpdate($id,Request $request){ return ProductService::productAvailability($id, $request); }
}
