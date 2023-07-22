@extends('user.layout.master')

@section('title', 'Kirim Lamaran')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Lamaran Kerja</h4>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <form action="/pelamar/lowongan/store" method="POST" enctype="multipart/form-data">
                       @csrf --}}
                       @foreach ($lamaran as $item)
                           
                       @endforeach
                       <div class="form-group row">
                        
                           <input type="hidden" name="id_lowongan" value="{{ $item->id }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Nama Lowongan</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{$item->nama_bidang}}"  id="id_lowongan" disabled name="id_lowongan" placeholder="Masukkan Nama Bidang...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Nama Pelamar</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{$item->id_user}}" readonly id="id_user" name="id_user" placeholder="Masukkan ID Pelamar...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_lamaran">Tanggal Lamaran</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{$item->tanggal_lamaran}}" id="tanggal_lamaran" name="tanggal_lamaran" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Promosikan Diri Anda!</label>
                            <div class="col-lg-6">
                                <textarea type="text" class="form-control"  value="{{old('catatan')}}" id="catatan" name="catatan" placeholder="Beritahu kami mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkonstribusi. Hindari hal generik seperti Saya bertanggung jawab." style="height: 200px"></textarea>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Status</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control"  value="{{old('status')}}" id="status" name="status" placeholder="Masukkan agama...">
                            </div>
                        </div> --}}
                       
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/pelamar/lowongan') }}" class="btn btn-danger">Batal</a>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection