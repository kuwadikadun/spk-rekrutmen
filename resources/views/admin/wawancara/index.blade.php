@extends('admin.layout.master')

@section('title', 'Data Pelamar Diterima')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Wawancara</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Lamaran</th>
                                <th>Jadwal Wawancara</th>
                                <th>Nama Pelamar</th>
                                <th>Ketegasan</th>
                                <th>Atitude</th>
                                <th>Grooming</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wawancara as $item)
                            <tr>                              
                                <th>1</th>
                                <td>{{$item->id_lamaran}}</td>
                                <td>{{$item->id_jadwalWawancara}}</td>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->ketegasan}}</td>
                                <td>{{$item->atitude}}</td>
                                <td>{{$item->grooming}}</td>
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