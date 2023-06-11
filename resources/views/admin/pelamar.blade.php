@extends('layout.main')

@section('title', 'Data Pelamar')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Pelamar</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>360000000</th>
                                <td>Bandung Bondowoso</td>
                                <td>Laki - Laki</td>
                                <td>22 Januari 2022</td>
                                <td>bandungwashere@gmail.com</td>
                                <td><a href="#" class="btn btn-success">View</a></td>
                            </tr>
                            <tr>
                                <th>370000000</th>
                                <td>Ken Dedes</td>
                                <td>Perempuan</td>
                                <td>22 Januari 2023</td>
                                <td>kenkenken@gmail.com</td>
                                <td><a href="#" class="btn btn-success">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection