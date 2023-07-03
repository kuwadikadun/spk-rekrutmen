@extends('admin.layout.master')

@section('title', 'Tambah Lowongan')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Jadwal Wawancara</h4>
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
                    <form action="/admin/jadwal_wawancara/store" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Lamaran</label>
                            <div class="col-lg-6">
                                <select name="id_lamaran" id="id_lamaran" class="form-control">
                                    <option disabled value="">Pilih Lamaran</option>
                                    @foreach ($lamaran as $data)
                                        <option value="{{$data->id}}">
                                            @php
                                            $tanggalLamaran = date('d F Y', strtotime($data->tanggal_lamaran))
                                        @endphp
                                        {{$tanggalLamaran}}
                                    </option>
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
                        <label class="col-lg-4 col-form-label" for="posisi">Tanggal Tes</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" value="{{old('tanggal_tes')}}" id="tanggal_tes" name="tanggal_tes" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Jam</label>
                            <div class="col-lg-6">
                               <select name="jam" id="jam" class="form-control">
                                <option disabled value="">Pilih Jam</option>
                                <option value="09:00 WIB">09:00 WIB</option>
                                <option value="13:00 WIB">13:00 WIB</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Lokasi</label>
                            <div class="col-lg-6">
                                <select name="lokasi" id="lokasi" class="form-control">
                                 <option disabled value="">Pilih Lokasi</option>
                                 <option value="Kantor Utama">Kantor Utama</option>
                                 <option value="Pusdiklat">Pusdiklat</option>
                                </select>
                             </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/admin/jadwal_wawancara') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection