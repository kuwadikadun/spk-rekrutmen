@extends('admin.layout.master')

@section('title', 'Ubah Lowongan Kerja')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Lowongan Kerja</h4>
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
                    @foreach ($apply as $item)
                        
                    {{-- <form action="/admin/lowongan/update/{{$lowongan->id}}" method="POST" enctype="multipart/form-data"> --}}
                       {{-- @csrf --}}
                       {{-- @method('PATCH') --}}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Nama Bidang</label>
                            <div class="col-lg-6">
                                <input readonly type="text" class="form-control" value="{{$item->nama_bidang}}" id="nama_bidang" name="nama_bidang" placeholder="Masukkan Nama Bidang...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Posisi</label>
                            <div class="col-lg-6">
                                <input readonly type="text" class="form-control" value="{{$item->posisi}}" id="posisi" name="posisi" placeholder="Masukkan Nama Posisi...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-lg-6">
                                <textarea readonly type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan alamat lengkap..." style="height: 200px">{{$item->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Kualifikasi</label>
                            <div class="col-lg-6">
                                <input readonly type="text" class="form-control" value="{{$item->kualifikasi}}" id="kualifikasi" name="kualifikasi" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_publish">Tanggal Publish</label>
                            <div class="col-lg-6">
                                <input readonly type="date" class="form-control" value="{{$item->tanggal_publish}}" id="tanggal_publish" name="tanggal_publish" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_publish">Tanggal Tutup</label>
                            <div class="col-lg-6">
                                <input readonly type="date" class="form-control" value="{{$item->tanggal_tutup}}" id="tanggal_tutup" name="tanggal_tutup" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Status</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control"  value="{{old('status')}}" id="status" name="status" placeholder="Masukkan agama...">
                            </div>
                        </div> --}}
                       
                        {{-- <button type="submit" class="btn btn-primary">Kirim</button> --}}
                        
                        <a href="{{ url('/pelamar/lowongan/lamaran', $item->id) }}" class="btn btn-success">Lamar Sekarang</a>
                        <a href="{{ url('/pelamar') }}" class="btn btn-danger">Kembali</a>
                    {{-- </form> --}}
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection