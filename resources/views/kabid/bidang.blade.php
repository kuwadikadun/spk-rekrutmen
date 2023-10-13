@extends('layout.main')

@section('title', 'Jadwal Tes Bidang')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Jadwal Tes Bidang</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Tes Bidang</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Bandung Bondowoso</td>
                                <td>22 Januaari 2022</td>
                                <td>80</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Ken Arok</td>
                                <td>22 Januaari 2023</td>
                                <td>95</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection