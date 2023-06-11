@extends('layout.main')

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
                                <th>Ranking</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Bandung Bondowoso</td>
                                <td>Laki - Laki</td>
                                <td>0812345678</td>
                                <td>bandungwashere@gmail.com</td>
                                <td>80</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Ken Dedes</td>
                                <td>Perempuan</td>
                                <td>08212345678</td>
                                <td>kenkenken@gmail.com</td>
                                <td>75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection