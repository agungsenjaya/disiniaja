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
                <th>Judul Frame</th>
                <th>Stock</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frame->reverse() as $fra)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $fra->name }}</td>
                <td>{{ $fra->qty }}</td>
                <td>{{ $fra->price }}</td>
                <td>{{ $fra->price_m }}</td>
                <td>
                    <a href="#" class="badge bg-primary w-100 py-2">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection