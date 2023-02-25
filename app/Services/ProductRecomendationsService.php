<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductRecomendationsService
{
    /**
     * @param int $productId current product id
     * @param int $categoryId current category id
     * @param int $reqAmount required amount of recommendations
     *
     * @return mixed
     */
    public function getRecommendations(int $productId, int $categoryId, int $reqAmount = 4)
    {
        $recommendations = Product::
                                    // select('count')
                                    // ->raw('SELECT count(`id`) FROM '')
                                  where('category_id', $categoryId)
                                  ->where('id', '<>', $productId)
                                  ->inRandomOrder()
                                  ->limit($reqAmount)
                                  ->get();

        $curAmount = count($recommendations);

        if ($curAmount < $reqAmount) {
            $otherProducts   = Product::where('category_id', '<>', $categoryId)
                                      ->inRandomOrder()
                                      ->limit($reqAmount - $curAmount)
                                      ->get();
            $recommendations = $recommendations->merge($otherProducts);
//            $recommendations = $recommendations + $otherProducts;
        }
        return $recommendations;
    }
}
