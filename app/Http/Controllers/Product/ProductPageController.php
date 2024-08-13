<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ProductPageController extends Controller
{
    public function __invoke(string $offer_id = '', string $product_id = '', string $visibility = 'ALL')
    {
        $request_body =
            "{
                \"filter\": {
                    \"offer_id\": [
                    \"$offer_id\"
                    ],
                    \"product_id\": [
                    \"$product_id\"
                    ],
                    \"visibility\": \"$visibility\"
                },
                \"last_id\": \"\",
                \"limit\": 100
            }";

        $data = json_decode($request_body, 1);

        $responce = Http::withHeaders(config('app.header'))->post('https://api-seller.ozon.ru/v3/product/info/stocks', $data);
        // Cache::rememberForever($offer_id, function () use ($data) {
        //     Http::withHeaders(config('app.header'))->post('https://api-seller.ozon.ru/v3/product/info/stocks', $data);
        // });
        // Cache::put($offer_id, Http::withHeaders(config('app.header'))->post('https://api-seller.ozon.ru/v3/product/info/stocks', $data), now()->addDays());
        // $responce = Cache::get($offer_id, 'default');

        $product = $responce['result']['items'];
        // dd($responce['result']['items']);
        $columns = [];
        $stocs = [];
        foreach ($product[0] as $key => $value) {
            if (is_array($value)) {
                $stocs = $value;
                continue;
            }

            // array_push($columns, $key);
            $columns[$key] = "$value";
        }
        for ($i = 0; $i < count($stocs); $i++) {
            // array_push($columns, $value[$i]['type']);
            $key = $stocs[$i]['type'] . ' (' . array_keys($stocs[$i])[1] . '/' . array_keys($stocs[$i])[2] . ')';
            $columns[$key] = "{$stocs[$i]['present']}/{$stocs[$i]['reserved']}";
        }
        $date = array_values($columns);
        $columns = array_keys($columns);
        return view('product_page.index', ['title' => 'Товар', 'columns' => $columns, 'date' => $date, 'offer_id' => $offer_id]);
    }
}