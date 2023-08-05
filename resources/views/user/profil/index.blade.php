@extends('user.layout.master')

@section('title', 'Lengkapi Profil')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Profil</h4>
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
                    <form >
                       
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nik">NIK</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{ $user->nik }}" id="nik" name="nik" placeholder="Masukkan Nomor Induk Kependudukan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name" placeholder="Masukkan nama lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-lg-6">
                                <select  class="form-control" id="jenis_kelamin"  name="kelamin">
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-lg-6">
                                <input type="textarea" class="form-control" value="{{ $user->alamat }}" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{ $user->tempat_lahir }}" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" id="tanggal_lahir" value="{{ $user->tanggal_lahir }}" name="tanggal_lahir" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                            <div class="col-lg-6">
                                {{-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama..."> --}}
                                <select  class="form-control" id="agama" name="agama">
                                    <option value="" disabled>Pilih Agama</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_telpon">Telepon</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{ $user->no_telpon }}" id="no_telpon" name="no_telpon" placeholder="Masukkan nomor telepon...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Masukkan email lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_telpon">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" placeholder="Masukkan pendidikan terakhir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_institusi">Nama Institusi</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" placeholder="Masukkan nama institusi / sekolah...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="cv">CV</label>
                            <div class="col-lg-6">
                                <input type="file" name="cv" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="ijazah">Ijazah</label>
                            <div class="col-lg-6">
                                <input type="file" name="ijazah" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="skck">SKCK</label>
                            <div class="col-lg-6">
                                <input type="file" name="skck" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="pas_foto">Pas Foto</label>
                            <div class="col-lg-6">
                                <input type="file" name="pas_foto" class="form-control-file">
                            </div>
                        </div>
                     
                        <a href="{{ url('/pelamar/profil/update/', auth()->user()->id) }}" class="btn  btn-warning">Edit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection