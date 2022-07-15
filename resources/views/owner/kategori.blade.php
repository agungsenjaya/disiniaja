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
                <th>Kategori</th>
                <th>Jml Paket</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori->reverse() as $kat)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-capitalize">{{ $kat->name }}</td>
                <td>-</td>
                <td>
                    <a href="{{ route('owner.kategori_edit',['id' => $kat -> id]) }}" class="btn btn-primary btn-sm w-100">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection