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

                @foreach ($sortedData as $namaBidang => $users)
                
                <div class="table-responsive">
                    <h2>Nama Bidang: {{ $namaBidang }}</h2>
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No Telpon</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Posisi</th>
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
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['no_telpon'] }}</td>
                                <td>{{ $user['alamat'] }}</td>
                                <td>{{ $user['jenis_kelamin'] }}</td>
                                <td>{{ $user['pendidikan_terakhir'] }}</td>
                                <td>{{ $user['posisi'] }}</td>
                                <td>{{ $user['total_admin'] }}</td>
                                <td>{{ $user['total_terampil'] }}</td>
                                <td>{{ $user['total_wawancara'] }}</td>
                                <td>{{ $user['total_semua'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-5" style="width: 100%; border-bottom: 3px solid black"></div>
                @endforeach
                <a href="/admin/peringkat/cetak" target="_blank" class="btn btn-primary">Cetak Tabel</a>
           
            </div>
        </div>
    </div>
   
</div>

{{-- <script>
    function printTabel() {
        var originalContents = document.body.innerHTML; // Simpan konten asli halaman
        var tableContainers = document.querySelectorAll('.table-responsive');

        if (tableContainers.length === 0) {
            return;
        }

        document.body.innerHTML = ''; // Kosongkan konten halaman

        tableContainers.forEach(function (tableContainer) {
            var clonedTableContainer = tableContainer.cloneNode(true);
            document.body.appendChild(clonedTableContainer);
            var horizontalRule = document.createElement('div');
            horizontalRule.style.width = '100%';
            horizontalRule.style.borderBottom = '3px solid black';
            document.body.appendChild(horizontalRule);
        });

        window.print(); // Cetak halaman

        document.body.innerHTML = originalContents; // Kembalikan konten asli halaman
    }
</script> --}}
@endsection
