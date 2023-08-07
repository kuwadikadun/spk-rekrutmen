@extends('admin.layout.master')

@section('title', 'Lengkapi Profil')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Data Akun</h4>
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
                    <form action="/admin/akun/store" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap...">
                            </div>
                        </div>                     
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_telpon">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password...">
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-lg-6">
                                <select  class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_institusi">Role</label>
                            <div class="col-lg-6">
                                <select  class="form-control" id="role" name="role">
                                    <option value="" disabled>Pilih Agama</option>
                                    <option value="admin">Admin</option>
                                    <option value="kepala bidang">Kepala Bidang</option>
                                </select>
                            </div>
                        </div>
                       
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_telpon">Role</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="role" name="role" placeholder="Masukkan Role">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="dokumen1">Dokumen 1</label>
                            <div class="col-lg-6">
                                <input type="file" name="dokumen1" class="form-control-file">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="dokumen2">Dokumen 2</label>
                            <div class="col-lg-6">
                                <input type="file" name="dokumen2" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="dokumen3">Dokumen 3</label>
                            <div class="col-lg-6">
                                <input type="file" name="dokumen3" class="form-control-file">
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection