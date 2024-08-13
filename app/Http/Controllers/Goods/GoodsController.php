<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\type;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $goods = $responce['result']['items'];
        $columns = [];
        foreach ($goods[0] as $keys => $value) {
            array_push($columns, $keys);
        }

        return view('goods.index', ['title' => 'Товары', 'goods' => $goods, 'columns' => $columns, 'total_page' => $total_page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}