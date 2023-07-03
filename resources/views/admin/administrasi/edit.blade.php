@extends('admin.layout.master')

@section('title', 'Ubah Data Administrasi')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Formulir Data Administrasi</h4>
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
                    @foreach ($user as $item) 
                    <form action="/admin/administrasi/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @endforeach
                       @csrf
                       @method('PATCH')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bidang">Lamaran</label>
                            <div class="col-lg-6">
                                <select name="id_lamaran" id="id_lamaran" class="form-control">
                                    <option disabled value="">Pilih Lamaran</option>
                                    @for ($i = 0; $i < $lamaranCount; $i++)
                                        <option @if ($lamaran[$i]['id'] == $user[0]['id_lamaran'])
                                            selected
                                        @endif value="{{$lamaran[$i]['id']}}">
                                        @php
                                                $tanggalLamaran = date('d F Y', strtotime($lamaran[$i]['tanggal_lamaran']))
                                            @endphp
                                            {{$tanggalLamaran}}
                                    </option>
                                    @endfor
                                    {{-- @foreach ($lamaran as $data)
                                        <option value="{{$data->id}}">{{$data->tanggal_lamaran}}</option>
                                     @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="posisi">Pelamar</label>
                           <div class="col-lg-6">
                                <select name="id_user" id="id_user" class="form-control">
                                    <option disabled value="">Pilih Pelamar</option>
                                    @for ($i = 0; $i < $pelamarCount; $i++)
                                        <option @if ($pelamar[$i]['id'] == $user[0]['id_user'])
                                            selected
                                        @endif value="{{$pelamar[$i]['id']}}">{{$pelamar[$i]['name']}}</option>
                                    @endfor
                                    {{-- @foreach ($pelamar as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                     @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Kelengkapan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{$user[0]['kelengkapan']}}" id="kelengkapan" name="kelengkapan" placeholder="Masukkan kelengkapan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Kerapihan</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{$user[0]['kerapihan']}}" id="kerapihan" name="kerapihan" placeholder="Masukkan kerapihan..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kualifikasi">Nilai Ijazah</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" max="100"  class="form-control" value="{{$user[0]['nilai_ijazah']}}" id="nilai_ijazah" name="nilai_ijazah" placeholder="Masukkan nilai ijazah...">
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