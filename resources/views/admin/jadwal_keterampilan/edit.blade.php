@extends('admin.layout.master')

@section('title', 'Edit Data Jadwal Tes Keterampilan')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Formulir Edit Jadwal Tes Keterampilan</h4>
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
                        
               
                    <form action="/admin/jadwal_keterampilan/update/{{$item->id}}" method="POST" enctype="multipart/form-data">
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
                        <label class="col-lg-4 col-form-label" for="posisi">Tanggal Tes</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" value="{{$data[0]['tanggal_tes']}}"  id="tanggal_tes" name="tanggal_tes" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Jam</label>
                            <div class="col-lg-6">
                               <select name="jam" id="jam" class="form-control">
                                <option disabled value="">Pilih Jam</option>
                                <option @if ($data[0]['jam'] == '09:00 WIB')
                                    selected
                                @endif value="09:00 WIB">Pria</option>
                                <option @if ($data[0]['jam'] == '13:00 WIB')
                                    selected
                                @endif value="13:00 WIB">13:00 WIB</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Lokasi</label>
                            <div class="col-lg-6">
                                <select name="lokasi" id="lokasi" class="form-control">
                                <option disabled value="">Pilih Lokasi</option>
                                 <option @if ($data[0]['lokasi'] == 'Kantor Utama')
                                     selected
                                 @endif value="Kantor Utama">Kantor Utama</option>
                                 <option @if ($data[0]['lokasi'] == 'Pusdiklat')
                                     selected
                                 @endif value="Pusdiklat">Pusdiklat</option>
                                </select>
                                </select>
                             </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ url('/admin/jadwal_keterampilan') }}" class="btn btn-danger">Batal</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection