@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('products'))
@section('content')
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">№</th>
                @foreach ($columns as $column)
                    <th scope="col">{{ $column }}</th>
                @endforeach
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item => $value)
                <tr>
                    <th scope="row">{{ $item + 1 }}</th>
                    <td>{{ $value['product_id'] }}</td>
                    <td>{{ $value['offer_id'] }}</td>
                    <td>{{ $value['is_fbo_visible'] }}</td>
                    <td>{{ $value['is_fbs_visible'] }}</td>
                    <td>{{ $value['archived'] ?: '-' }}</td>
                    <td>{{ $value['is_discounted'] ?: '-' }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="" class="btn btn-dark border-white">info</a>
                            <a href="{{ route('product.index', ['offer_id' => $value['offer_id'], 'product_id' => $value['product_id']]) }}"
                                class="btn btn-dark border-white">Stoks</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Общее число страниц {{ $total_page }}</p>
@endsection
