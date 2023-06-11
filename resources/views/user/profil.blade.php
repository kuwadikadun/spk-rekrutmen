@extends('layout.main')

@section('title', 'Lengkapi Profil')

@section('content')
    <div class="row justify-content-center">
        <h4 class="mb-3">Lengkapi Profil</h4>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nik">NIK</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor Induk Kependudukan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama">Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kelamin">Jenis Kelamin</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="kelamin" name="kelamin" placeholder="Masukkan jenis kelamin...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-lg-6">
                                <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tmplahir">Tempat Lahir</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="tmplahir" name="tmplahir" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tgllahir">Tanggal Lahir</label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Masukkan tempat lahir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="telepon">Telepon</label>
                            <div class="col-lg-6">
                                <input type="telepon" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="pendidikan">Pendidikan Terakhir</label>
                            <div class="col-lg-6">
                                <input type="pendidikan" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan pendidikan terakhir...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="institusi">Nama Institusi</label>
                            <div class="col-lg-6">
                                <input type="institusi" class="form-control" id="institusi" name="institusi" placeholder="Masukkan nama institusi / sekolah...">
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
                            <label class="col-lg-4 col-form-label" for="foto">Pas Foto</label>
                            <div class="col-lg-6">
                                <input type="file" name="foto" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="dokumen1">Dokumen 1</label>
                            <div class="col-lg-6">
                                <input type="file" name="dokumen1" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
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
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection