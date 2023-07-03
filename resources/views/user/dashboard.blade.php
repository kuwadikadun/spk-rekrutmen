@extends('user.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12 m-b-30">
        <h4 class="d-inline">Lowongan Terbaru</h4>
        <div class="row mt-3">
            @foreach ($lowongan as $item)
                
            <div class="col-md-6 col-lg-3">
                <div class="card" style="width:100%">
                    <img class="img-fluid" src="images/big/img1.jpg" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->nama_bidang }}</h2>
                        <h4 class="card-text">{{ $item->posisi }}</h4>
                        <p class="card-text">Kualifikasi : {{ $item->kualifikasi }}</p>
                        <a href="{{url('/pelamar/lowongan/detail', $item->id)}}" class="card-link"><small>Lihat Lowongan</small></a>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 m-b-30">
        <h4 class="d-inline">Sudah Apply</h4>
        @foreach ($apply as $item)
            
        <div class="row mt-3">
            <div class="card" style="width:100%">
                <img class="img-fluid" src="images/big/img1.jpg" alt="">
                <div class="card-body">
                    <h2 class="card-title">{{ $item->nama_bidang }}</h2>
                    <h4 class="card-text">{{ $item->posisi }}</h4>
                    <p class="card-text">Kualifikasi : {{ $item->kualifikasi }}</p>
                    <a href="{{ url('/pelamar/lowongan', $item->id) }}" class="card-link"><small>Lihat Lamaran</small></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection