@extends('kabid.layout.master')

@section('title', 'Ubah Nilai Wawancara')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Formulir Ubah Nilai Wawancara</h4>
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
                        
                    <form action="/admin/wawancara/update/{{ $data[0]['id'] }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PATCH')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Lamaran</label>
                            <div class="col-lg-6">
                                <select name="id_lamaran" id="id_lamaran" class="form-control">
                                    <option disabled value="">Pilih Lamaran</option>
                                    @for ($i = 0; $i < $lamaranCount; $i++)
                                    <option @if ($lamaran[$i]['id'] == $data[0]['id_lamaran'])
                                    selected
                                @endif value="{{$lamaran[$i]['id']}}">
                                @php
                                        $tanggalLamaran = date('d F Y', strtotime($lamaran[$i]['tanggal_lamaran']))
                                    @endphp
                                    {{$tanggalLamaran}}
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Jadwal Wawancara</label>
                            <div class="col-lg-6">
                                <select name="id_jadwalWawancara" id="id_jadwalWawancara" class="form-control">
                                    <option disabled value="">Pilih Jadwal Wawancara</option>
                                    @for ($i = 0; $i < $jadwalWawancaraCount; $i++)
                                    <option @if ($jadwalWawancara[$i]['id'] == $data[0]['id_jadwalWawancara'])
                                    selected
                                @endif value="{{$jadwalWawancara[$i]['id']}}">
                                @php
                                        $tanggalWawancara = date('d F Y', strtotime($jadwalWawancara[$i]['tanggal_tes']))
                                    @endphp
                                    {{$tanggalWawancara}}
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Pelamar</label>
                           <div class="col-lg-6">
                                <select name="id_user" id="id_user" class="form-control">
                                    <option disabled value="">Pilih Pelamar</option>
                                    @for ($i = 0; $i < $pelamarCount; $i++)
                                        <option @if ($pelamar[$i]['id'] == $data[0]['id_user'])
                                            selected
                                        @endif value="{{$pelamar[$i]['id']}}">{{$pelamar[$i]['name']}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Ketegasan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{ $data[0]['ketegasan'] }}" id="ketegasan" name="ketegasan" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Atitude</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{ $data[0]['atitude'] }}" id="atitude" name="atitude" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Grooming</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{ $data[0]['grooming'] }}" id="grooming" name="grooming" placeholder="Masukkan tempat lahir...">
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