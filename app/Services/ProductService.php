<?php

namespace App\Services;

use Exception;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductService
{
    public function create($request)
    {
        try{
            DB::beginTransaction();

            $product = Product::create($request->validated());

            DB::commit();

            return successMessage('Product Created Successfully.',200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService create:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService create:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }

    public function list()
    {
        try{
            DB::beginTransaction();

            $product = Product::all();

            DB::commit();

            return successResponse(new ProductCollection($product),200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService list:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService list:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }

    public function showProduct($pro_id)
    {
        try{
            DB::beginTransaction();

            $product = Product::with('stocks')->find($pro_id);

            DB::commit();

            return successResponse(new ProductResource($product),200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService showProduct:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService showProduct:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            $product->delete();

            DB::commit();

            return successMessage('Successfully Deleted the product',200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService delete:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService delete:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }

    public function updateProduct($request,$id)
    {
        try{
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->save();

            DB::commit();

            return successMessage('Successfully Updated the product',200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService updateProduct:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService updateProduct:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }

    public function productAvailability($id,$data)
    {
        try{
            DB::beginTransaction();
            dd($data);

            $product = Product::findOrFail($id);
            $product->isActive = $data->isActive;
            $product->save();

            DB::commit();

            return successMessage('Successfully Updated the Status',200);

        }catch(InvalidTokenException $e){

            DB::rollBack();

            Log::info('Error in ProductService productAvailability:'.$e);
            return errorMessage('Token not valid',500);

        }catch(Exception $e)
        {
            DB::rollBack();

            Log::info('Error in ProductService productAvailability:'.$e->getMessage());
            return errorMessage($e->getMessage(),500);
        }
    }
}
