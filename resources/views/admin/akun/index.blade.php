@extends('admin.layout.master')

@section('title', 'Data Akun')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Akun</h4>
                    <a href="{{ url('/admin/akun/create') }}" class="btn btn-primary">Tambah Data Akun</a>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Role</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $item)
                            <tr>                              
                                <th>{{ $loop->iteration }}</th>
                               
                                <td>{{$item->name}}</td>
                                <td>
                                   {{$item->email}}
                                </td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->role}}</td>
                                <td>
                                    <form action="{{url('/admin/akun/delete', $item->id)}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Hapus">
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