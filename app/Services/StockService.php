<?php
namespace App\Services;

use Exception;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class StockService
{
    public function create($data)
    {
        try{

            DB::beginTransaction();

            Stock::create($data);

            DB::commit();

            return successMessage('Created Stock Successfully.',200);

            }catch(InvalidTokenException $e){

                DB::rollBack();

                Log::info('Error in StockService create:'.$e);
                return errorMessage('Token not valid',500);

            }catch(Exception $e)
            {

                DB::rollBack();

                Log::info('Error in StockService create:'.$e->getMessage());
                return errorMessage($e->getMessage(),500);
            }
    }

}
