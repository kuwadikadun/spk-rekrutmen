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
                    <form action="/admin/administrasi/store" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Lamaran</label>
                            <div class="col-lg-6">
                                <select name="id_lamaran" id="id_lamaran" class="form-control">
                                    <option disabled value="">Pilih Lamaran</option>
                                    @foreach ($lamaran as $data)
                                        <option value="{{$data->id}}">{{$data->tanggal_lamaran}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Pelamar</label>
                           <div class="col-lg-6">
                                <select name="id_user" id="id_user" class="form-control">
                                    <option disabled value="">Pilih Pelamar</option>
                                    @foreach ($pelamar as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Kelengkapan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('kelengkapan')}}" id="kelengkapan" name="kelengkapan" placeholder="Masukkan kelengkapan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Kerapihan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('kerapihan')}}" id="kerapihan" name="kerapihan" placeholder="Masukkan kerapihan..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Nilai Ijazah</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('nilai_ijazah')}}" id="nilai_ijazah" name="nilai_ijazah" placeholder="Masukkan nilai ijazah...">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/admin/administrasi') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection