@extends('layout.main')

@section('title', 'Data User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data User</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>360000000</th>
                                <td>Bandung Bondowoso</td>
                                <td>bandungwashere@gmail.com</td>
                                <td>******</td>
                            </tr>
                            <tr>
                                <th>370000000</th>
                                <td>Ken Dedes</td>
                                <td>kenkenken@gmail.com</td>
                                <td>******</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection