<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use App\Http\Controllers\Controller;
use StockImplement;

class StockController extends Controller
{
    public function create(StockRequest $request){ return StockImplement::create($request->validated()); }
}
