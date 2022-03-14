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
                <th>Code</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Tgl</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->reverse() as $or)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $or->code }}</td>
                <td>{{ $or->name }}</td>
                <td>{{ $or->package_id }}</td>
                <td>{{ $or->created_at }}</td>
                <td>
                    <a href="#" class="badge bg-primary w-100">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection