@extends('user.layout.master')

@section('title', 'Lowongan Kerja')

@section('content')
<div class="row">
    <div class="col-12 m-b-3">
        <div class="row">
            <div class="col-12 justify-content-center">
                <h2 class="text-center mt-3">Lowongan Kerja</h2>
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($lowongan as $item)
            <div class="col-md-6 col-lg-6">
                <div class="card" style="width:100%">
                    {{-- <img class="img-fluid" src="images/big/img1.jpg" alt=""> --}}
                    <div class="card-body">
                        <h2 class="card-title">{{$item->nama_bidang}}</h2>
                        <h4 class="card-text">{{$item->posisi}}</h4>

                        <p class="card-text">
                            Deskripsi :
                            {{$item->deskripsi}}</p>
                        <p class="card-text">
                            Kualifikasi :
                            {{$item->kualifikasi}}</p>
                        <a href="{{url('/pelamar/lowongan/detail', $item->id)}}" class="card-link"><small>Lihat Lowongan</small></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection