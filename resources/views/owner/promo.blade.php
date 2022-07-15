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
                <th>Name</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Date End</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promo->reverse() as $pro)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pro->name }}</td>
                <td>
                    @if($pro->price)
                    Rp {{ $pro->price }}
                    @else
                    {{ $pro->percent }}
                    @endif
                </td>
                <td>{{ $pro->status }}</td>
                <td>
                    @if($pro->date)
                    {{ $pro->date }}
                    @else
                    -
                    @endif
                </td>
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