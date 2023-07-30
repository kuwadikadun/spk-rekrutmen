@extends('admin.layout.master')

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
                                <th>Bidang</th>
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
                                <td>{{ $sort[$i]['nama_bidang'] }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div> --}}

                @foreach ($sortedData as $namaBidang => $users)
<h2>{{ $namaBidang }}</h2>
<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Peringkat</th>
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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user[0] }}</td>
                <td>{{ $user[1] }}</td>
                <td>{{ $user[2] }}</td>
                <td>{{ $user[3] }}</td>
                <td>{{ $user[4] }}</td>
                <td>{{ $user[5] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="my-5" style="width: 100%; border-bottom: 3px solid black"></div>
@endforeach
            </div>
        </div>
    </div>
</div>
@endsection