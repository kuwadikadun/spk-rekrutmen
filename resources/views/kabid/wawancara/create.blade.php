@extends('kabid.layout.master')

@section('title', 'Tambah Lowongan')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Wawancara</h4>
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
                    <form action="/admin/wawancara/store" method="POST" enctype="multipart/form-data">
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
                            <label class="col-lg-4 col-form-label" for="bidang">Jadwal Wawancara</label>
                            <div class="col-lg-6">
                                <select name="id_jadwalWawancara" id="id_jadwalWawancara" class="form-control">
                                    <option disabled value="">Pilih Jadwal Wawancara</option>
                                    @foreach ($jadwal_wawancara as $data)
                                        <option value="{{$data->id}}">
                                            @php
                                            $tanggalTes = date('d F Y', strtotime($data->tanggal_tes))
                                            @endphp
                                            {{$tanggalTes}}
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
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Ketegasan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('ketegasan')}}" id="ketegasan" name="ketegasan" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Atitude</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('atitude')}}" id="atitude" name="atitude" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Grooming</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{old('grooming')}}" id="grooming" name="grooming" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/admin/wawancara') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection