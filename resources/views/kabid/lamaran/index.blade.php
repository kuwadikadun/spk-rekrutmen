@extends('kabid.layout.master')

@section('title', 'Lamaran')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Lamaran</h4>
                    {{-- <a href="{{ url('/admin/keterampilan/create') }}" class="btn btn-primary">Tambah Data</a> --}}
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
                                <th>Nama Lowongan</th>
                                <th>Posisi</th>
                                <th>(NIK) Nama Pelamar</th>
                                <th>Tanggal Lamaran</th>
                                <th>Status</th>
                                {{-- <th>Catatan</th> --}}
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>                              
                                <th>{{ $loop->iteration }}</th>
                                <td>{{$item->nama_bidang}} </td>
                                <td>{{ $item->posisi}}</td>
                                <td>
                                    ({{$item->nik}}) {{$item->name}}
                                </td>
                                <td>
                                    @php
                                        $tanggalLamaran = date('d F Y', strtotime($item->tanggal_lamaran))
                                    @endphp
                                    {{$tanggalLamaran}}
                                </td>
                                <td>{{$item->status}}</td>
                                {{-- <td>{{$item->catatan}}</td> --}}
                                <td>
                                    <form action="{{url('/admin/lamaran/view', $item->id)}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-primary" value="View">
                                    </form>
                                </td>
                      
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