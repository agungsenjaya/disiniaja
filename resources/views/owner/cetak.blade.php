@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp
<section class="card">
    <div class="card-body">
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Cetak</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cetak->reverse() as $cet)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $cet->name }}</td>
                <td>{{ $cet->price }}</td>
                <td>{{ $cet->price_m }}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm w-100">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection