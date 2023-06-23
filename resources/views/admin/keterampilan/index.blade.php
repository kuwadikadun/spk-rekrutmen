@extends('admin.layout.master')

@section('title', 'Data Pelamar Diterima')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Jadwal Keterampilan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Lamaran</th>
                                <th>Jadwal Keterampilan</th>
                                <th>Nama Pelamar</th>
                                <th>Psikotes</th>
                                <th>Ketangkasan</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keterampilan as $item)
                            <tr>                              
                                <th>1</th>
                                <td>{{$item->id_lamaran}}</td>
                                <td>{{$item->id_jadwalKeterampilan}}</td>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->psikotes}}</td>
                                <td>{{$item->ketangkasan}}</td>
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