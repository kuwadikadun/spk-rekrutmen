@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama">Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email lengkap...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-lg-6">
                                <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap...">
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
                            <label class="col-lg-4 col-form-label" for="sehat">Surat Keterangan Sehat</label>
                            <div class="col-lg-6">
                                <input type="file" name="sehat" class="form-control-file">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection