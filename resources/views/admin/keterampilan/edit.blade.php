@extends('admin.layout.master')

@section('title', 'Ubah Nilai Keterampilan')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Formulir Ubah Nilai Keterampilan</h4>
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
                    @foreach ($data as $item)
                    <form action="/admin/keterampilan/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
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
                            <label class="col-lg-4 col-form-label" for="bidang">Jadwal Keterampilan</label>
                            <div class="col-lg-6">
                                <select name="id_jadwalKeterampilan" id="id_jadwalKeterampilan" class="form-control">
                                    <option disabled value="">Pilih Jadwal Keterampilan</option>
                                    @for ($i = 0; $i < $jadwalKeterampilanCount; $i++)
                                    <option @if ($jadwalKeterampilan[$i]['id'] == $data[0]['id_jadwalKeterampilan'])
                                    selected
                                @endif value="{{$jadwalKeterampilan[$i]['id']}}">
                                @php
                                        $tanggalKeterampilan = date('d F Y', strtotime($jadwalKeterampilan[$i]['tanggal_tes']))
                                    @endphp
                                    {{$tanggalKeterampilan}}
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
                                        <option
                                         @if ($pelamar[$i]['id'] == $data[0]['id_user'])
                                            selected
                                        @endif
                                         value="{{$pelamar[$i]['id']}}">{{$pelamar[$i]['name']}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Psikotes</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{$data[0]['psikotes']}}" id="psikotes" name="psikotes" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Ketangkasan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{$data[0]['ketangkasan']}}" id="ketangkasan" name="ketangkasan" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/admin/keterampilan') }}" class="btn btn-danger">Batal</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection