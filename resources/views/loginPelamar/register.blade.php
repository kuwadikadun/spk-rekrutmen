@extends('loginPelamar.layout')

@section('title','Register')

@section('login')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <h4 class="text-center">Register</h4>
        
                                <form class="mt-5 mb-5 login-input" action="/register/store" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor Induk Kependudukan...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email lengkap...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select  class="form-control" id="jenis_kelamin" name="kelamin">
                                            <option value="" disabled>Pilih Jenis Kelamin</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tempat lahir...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <select  class="form-control" id="agama" name="agama">
                                            <option value="" disabled>Pilih Agama</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No Telpon</label>
                                        <input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukkan nomor telepon...">
                                    </div>
                                  
                                  
                                    <div class="form-group">
                                        <label for="">Pendidikan Terakhir</label>
                                        <select  class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir">
                                            <option value="" disabled>Pilih Pendidikan Terakhir</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma">SMA</option>
                                            <option value="smk">SMK</option>
                                            <option value="s1">S1</option>
                                            <option value="s2">S2</option>
                                            <option value="s3">S3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Institusi</label>
                                        <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" placeholder="Masukkan nama institusi / sekolah...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">CV</label>
                                        <input type="file" name="cv" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ijazah</label>
                                        <input type="file" name="ijazah" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">SKCK</label>
                                        <input type="file" name="skck" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pas Foto</label>
                                        <input type="file" name="pas_foto" class="form-control-file">
                                    </div>
                                   
                                    <button type="submit" class="btn login-form__btn submit w-100">Register</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Have account? <a href="{{ url('/') }}" class="text-primary">Sign In </a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection



