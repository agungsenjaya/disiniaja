@extends('layouts.owner')
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
                <th>Nama</th>
                <th>Price</th>
                <th>Tgl</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paket->reverse() as $pak)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-capitalize">{{ $pak->name }}</td>
                <td>Rp {{ $pak->price }}</td>
                <td>{{ $pak->created_at }}</td>
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