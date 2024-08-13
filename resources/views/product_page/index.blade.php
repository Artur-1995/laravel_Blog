@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('product', $offer_id))
@section('content')

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Ozon</th>
            </tr>
        </thead>

        <thead>

            <tr>
                @foreach ($columns as $column)
                    <th scope="col">{{ $column }}</th>
                @endforeach
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($date as $item)
                    <td>{{ $item }}</td>
                @endforeach
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="" class="btn btn-dark border-white">info</a>
                        <a href="" class="btn btn-dark border-white">Stoks</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <p>Общее число страниц {{ $total_page }}</p> --}}
@endsection
