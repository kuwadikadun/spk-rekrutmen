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
                
                {{-- <div class="table-responsive">
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
                </div> --}}

                {{-- user/peringkat/index.blade.php --}}

@foreach ($sortedData as $namaBidang => $users)
<h2>{{ $namaBidang }}</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>No Telpon</th>
            <th>Total Admin</th>
            <th>Total Terampil</th>
            <th>Total Wawancara</th>
            <th>Total Semua</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['no_telpon'] }}</td>
                <td>{{ $user['total_admin'] }}</td>
                <td>{{ $user['total_terampil'] }}</td>
                <td>{{ $user['total_wawancara'] }}</td>
                <td>{{ $user['total_semua'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection