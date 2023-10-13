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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telpon</th>
                                {{-- <th>Catatan</th> --}}
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>                              
                                <th>{{ $loop->iteration }}</th>
                                <td>{{$item->nik}} </td>
                                <td>{{ $item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->no_telpon}}</td>
                                {{-- <td>{{$item->catatan}}</td> --}}
                                <td>
                                    <a href="{{url('/admin/pelamar', $item->id)}}" class="btn btn-primary">View</a>
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