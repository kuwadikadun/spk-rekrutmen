@extends('user.layout.master')


@section('title', 'Jadwal Tes Wawancara')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Jadwal Tes Wawancara</h4>
                    {{-- <a href="{{ url('/admin/jadwal_wawancara/create') }}" class="btn btn-primary">Tambah Data</a> --}}
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Lamaran</th>
                                <th>Nama Pelamar</th>
                                <th>Tanggal Tes</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
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
                                    {{$tanggalLamaran}}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @php
                                        $tanggalTes = date('d F Y', strtotime($item->tanggal_tes))
                                    @endphp
                                    {{$tanggalTes}}
                                </td>
                                <td>{{$item->jam}}</td>
                                <td>{{$item->lokasi}}</td>
                                {{-- <td>
                                    <form action="{{url('/admin/jadwal_wawancara/delete', $item->id)}}" method="post" class="d-inline-block">
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