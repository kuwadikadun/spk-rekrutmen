<!DOCTYPE html>
<html>
<head>
    <title>Halaman Cetak</title>
    <style>
        /* CSS Khusus untuk Cetak */
        /* Tambahkan gaya kustom Anda di sini untuk halaman cetak */
        @media print {
            /* Atur ukuran dan margin untuk halaman cetak */
            @page {
                size: landscape;
                margin: 20mm;
            }

            /* Tambahkan gaya kustom Anda untuk halaman cetak */
            /* Misalnya, Anda dapat menambahkan gaya untuk logo dan atribut lainnya */
            .logo {
                /* Tambahkan gaya untuk logo di sini */
            }

            /* Tambahkan gaya untuk atribut lainnya */

            body {
                font-family: Arial, sans-serif;
            }

            /* Tambahkan gaya kustom lainnya untuk halaman cetak */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
            margin-top: 50px;
        }
        @media print{
            body {
                margin: 20px 100px;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="logo">
        <!-- Tambahkan logo Anda di sini -->
        <img src="{{ asset('assets/img/bpbdkabserang.png') }}" width="100px" alt="Logo">
    </div>
    <!-- Tambahkan atribut lainnya di sini -->
    {{-- <p>Informasi tambahan:</p> --}}
    <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    <!-- Tambahan atribut lainnya sesuai kebutuhan -->

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
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
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
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td class="text-center">{{ $user['no_telpon'] }}</td>
                                    <td>{{ $user['alamat'] }}</td>
                                    <td class="text-center">{{ $user['jenis_kelamin'] }}</td>
                                    <td class="text-center">{{ $user['pendidikan_terakhir'] }}</td>
                                    <td class="text-center">{{ $user['posisi'] }}</td>
                                    <td class="text-center">{{ $user['total_admin'] }}</td>
                                    <td class="text-center">{{ $user['total_terampil'] }}</td>
                                    <td class="text-center">{{ $user['total_wawancara'] }}</td>
                                    <td class="text-center">{{ $user['total_semua'] }}</td>
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
</body>
</html>
