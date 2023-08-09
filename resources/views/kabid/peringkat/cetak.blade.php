<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Laporan</title>
            <style>
                @page {
                    size: A4 landscape;
                    margin: 0;
                }

                body {
                    margin: 2cm;
                }

                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                p {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .logo {
                    height: 80px;
                    width: auto;
                    display: block;
                    text-align: left;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th,
                td {
                    border: 1px solid #000;
                    padding: 8px;
                    text-align: center;
                }

                .wrap-text {
                    word-wrap: break-word;
                    white-space: normal;
                }

                .page-break {
                    page-break-after: always;
                }
            </style>
        </head>

      <body>


            <header>
                <img src="{{ asset('assets/img/bpbdkabserang.png') }}"
                    alt="Logo Perusahaan" class="logo">
                <h1 class="wrap-text">Laporan Peringkat</h1>
            </header>
            @foreach ($sortedData as $namaBidang => $users)
            <main>
                {{-- <p>Berikut ini merupakan hasil penilaian untuk penentuan perpanjangan kontrak kerja Pegawai Tidak Tetap (PTT) :</p> --}}
                <h2>Nama Bidang : {{ $namaBidang }}</h2>
                <p class="text-center">Tanggal Cetak: {{ date('d-m-Y') }}</p>
                
                <table>
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
         
           
              
        </main>
        @endforeach
        <script>
            window.onload = function () {
                window.print();
            };
        </script>
        
        {{-- @if (!$loop->last)
            <div class="page-break"></div>
        @endif --}}


</body>

</html>