@extends('admin.layout.master')

@section('title', 'Tambah Lowongan')

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
                    <form action="/admin/lowongan/store" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Nama Bidang</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{old('nama_bidang')}}" id="nama_bidang" name="nama_bidang" placeholder="Masukkan Nama Bidang...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Posisi</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{old('posisi')}}" id="posisi" name="posisi" placeholder="Masukkan Nama Posisi...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-lg-6">
                                <textarea type="text" class="form-control"  value="{{old('deskripsi')}}" id="deskripsi" name="deskripsi" placeholder="Masukkan alamat lengkap..." style="height: 200px"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="lualifikasi">Kualifikasi</label>
                            <div class="col-lg-6">
                                <select  class="form-control" id="kualifikasi" name="kualifikasi">
                                    <option value="" disabled>Pilih kualifikasi</option>
                                    <option value="sma">SMA</option>
                                    <option value="smk">SMK</option>
                                    <option value="s1">S1</option>
                                    <option value="s2">S2</option>
                                    <option value="s3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_publish">Tanggal Publish</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" value="{{old('tanggal_publish')}}" id="tanggal_publish" name="tanggal_publish" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_publish">Tanggal Tutup</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" value="{{old('tanggal_tutup')}}" id="tanggal_tutup" name="tanggal_tutup" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Status</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control"  value="{{old('status')}}" id="status" name="status" placeholder="Masukkan agama...">
                            </div>
                        </div> --}}
                       
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="/admin/lowongan" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection