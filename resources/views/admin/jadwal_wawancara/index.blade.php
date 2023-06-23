@extends('admin.layout.master')

@section('title', 'Data Pelamar Diterima')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Jadwal Wawancara</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Lamaran</th>
                                <th>Nama Pelamar</th>
                                <th>Tanggal Tes</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal_wawancara as $item)
                            <tr>                              
                                <th>1</th>
                                <td>{{$item->id_lamaran}}</td>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->tanggal_tes}}</td>
                                <td>{{$item->jam}}</td>
                                <td>{{$item->lokasi}}</td>
                      
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