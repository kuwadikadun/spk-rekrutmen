@extends('admin.layout.master')

@section('title', 'Data Pelamar Diterima')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Pelamar Diterima</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lowongan</th>
                                <th>NIK</th>
                                <th>Kelengkapan</th>
                                <th>Kerapihan</th>
                                <th>Nilai Ijazah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administrasi as $item)
                            <tr>                              
                                <th>1</th>
                                <td>{{$item->id_lamaran}}</td>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->kelengkapan}}</td>
                                <td>{{$item->kerapihan}}</td>
                                <td>{{$item->nilai_ijazah}}</td>
                                <td>{{$item->total}}</td>
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