<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function __invoke()
    {

        $data = json_decode('{

            "last_id": "",
            "limit": 100
            }', 1);

        $responce = Http::withHeaders(config('app.header'))->post('https://api-seller.ozon.ru/v2/product/list', $data);

        // общее число страниц
        $total_page = (int) ceil($responce['result']['total'] / count($responce['result']['items']));

        // Номер страницы
        // $number_page = (int) ceil($responce['result']['total'] / count($responce['result']['items']));

        $products = $responce['result']['items'];
        $columns = [];
        foreach ($products[0] as $keys => $value) {
            array_push($columns, $keys);
        }

        return view('products.index', ['title' => 'Товары', 'products' => $products, 'columns' => $columns, 'total_page' => $total_page]);
    }
}
