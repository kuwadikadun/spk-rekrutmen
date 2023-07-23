@extends('admin.layout.master')

@section('title', 'Pelamar')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Pelamar</h4>
                    {{-- <a href="{{ url('/admin/keterampilan/create') }}" class="btn btn-primary">Tambah Data</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tbody>
                            <tr>
                                <td width=300px>NIK</td>
                                <td width=10px>:</td>
                                <td>{{ $user->nik }}</td>
                            </tr>    
                            <tr>
                                <td width=300px>Nama Lengkap</td>
                                <td width=10px>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Email</td>
                                <td width=10px>:</td>
                                <td><a href="mailto: {{ $user->email }}" target="_blank">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td width=300px>Jenis Kelamin</td>
                                <td width=10px>:</td>
                                <td>{{ ucwords($user->jenis_kelamin) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Alamat</td>
                                <td width=10px>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Tempat Lahir</td>
                                <td width=10px>:</td>
                                <td>{{ ucwords($user->tempat_lahir) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Tanggal Lahir</td>
                                <td width=10px>:</td>
                                <td>{{ date("d F Y", strtotime($user->email)) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Agama</td>
                                <td width=10px>:</td>
                                <td>{{ ucwords($user->agama) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Nomor Telepon</td>
                                <td width=10px>:</td>
                                <td><a href="tel: {{ $user->no_telpon }}">{{ $user->no_telpon }}</a></td>
                            </tr>
                            <tr>
                                <td width=300px>Pendidikan Terakhir</td>
                                <td width=10px>:</td>
                                <td>{{ ucwords($user->pendidikan_terakhir) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Nama Institusi</td>
                                <td width=10px>:</td>
                                <td>{{ ucwords($user->nama_institusi) }}</td>
                            </tr>
                            <tr>
                                <td width=300px>Curriculum Vitae / CV</td>
                                <td width=10px>:</td>
                                <td><a href="{{ $user->cv }}" target="_blank">{{ $user->cv }}</a></td>
                            </tr>
                            <tr>
                                <td width=300px>Ijazah</td>
                                <td width=10px>:</td>
                                <td><a href="{{ $user->ijazah }}" target="_blank">{{ $user->ijazah }}</a></td>
                            </tr>
                            <tr>
                                <td width=300px>Surat Keterangan Catatan Kepolisian</td>
                                <td width=10px>:</td>
                                <td><a href="{{ $user->skck }}" target="_blank">{{ $user->skck }}</a></td>
                            </tr>
                            <tr>
                                <td width=300px>Pas Foto</td>
                                <td width=10px>:</td>
                                <td>
                                    <img width="150px" src="{{ $user->pas_foto }}" alt="Pas Foto">
                                    {{-- <img width="150px" src="{{ asset('/assets/img/bpbdkabserang.png') }}" alt="Pas Foto"> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ url('admin/pelamar') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection