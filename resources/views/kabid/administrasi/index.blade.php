@extends('kabid.layout.master')

@section('title', 'Administrasi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Administrasi</h4>
                    {{-- <a href="{{ url('/admin/administrasi/create') }}" class="btn btn-primary">Tambah Data</a> --}}
                </div>
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Lamaran</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kelengkapan</th>
                                <th>Kerapihan</th>
                                <th>Nilai Ijazah</th>
                                <th>Nilai Asli Kelengkapan</th>
                                <th>Nilai Asli Kerapihan</th>
                                <th>Nilai Asli Ijazah</th>
                                <th>Nilai Bobot Kelengkapan</th>
                                <th>Nilai Bobot Kerapihan</th>
                                <th>Nilai Bobot Ijazah</th>
                                <th>CF</th>
                                <th>SF</th>
                                <th>Total</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>                              
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    @php
                                        $tanggalLamaran = date('d F Y', strtotime($item->tanggal_lamaran))
                                    @endphp
                                    {{$tanggalLamaran}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->kelengkapan}}</td>
                                <td>{{$item->kerapihan}}</td>
                                <td>{{$item->nilai_ijazah}}</td>
                                <td>{{$item->nilaiasli_kelengkapan}}</td>
                                <td>{{$item->nilaiasli_kerapihan}}</td>
                                <td>{{$item->nilaiasli_ijazah}}</td>
                                <td>{{$item->nilaibobot_kelengkapan}}</td>
                                <td>{{$item->nilaibobot_kerapihan}}</td>
                                <td>{{$item->nilaibobot_ijazah}}</td>
                                <td>{{$item->cf}}</td>
                                <td>{{$item->sf}}</td>
                                <td>{{$item->total}}</td>
                                {{-- <td>
                                    <a href="{{ url('/admin/administrasi/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{url('/admin/administrasi/delete', $item->id)}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Hapus">
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection