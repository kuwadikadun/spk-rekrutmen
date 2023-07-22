@extends('user.layout.master')


@section('title', 'Peringkat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Peringkat</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Nama</th>
                                <th>No. Telepon</th>
                                <th>Administrasi</th>
                                <th>Keterampilan</th>
                                <th>Wawancara</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < $peringkatCount; $i++)
                                
                            <tr>
                                <th>{{ $i+1 }}</th>
                                <td>{{ $sort[$i]['name'] }}</td>
                                <td>{{ $sort[$i]['no_telpon'] }}</td>
                                <td>{{ $sort[$i]['total_admin'] }}</td>
                                <td>{{ $sort[$i]['total_terampil'] }}</td>
                                <td>{{ $sort[$i]['total_wawancara'] }}</td>
                                <td>{{ $sort[$i]['total_semua'] }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection