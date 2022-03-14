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
            @foreach($paket->reverse() as $pak)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pak->code }}</td>
                <td>{{ $pak->name }}</td>
                <td>{{ $pak->package_id }}</td>
                <td>{{ $pak->created_at }}</td>
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