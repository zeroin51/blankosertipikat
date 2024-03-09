@include('layouts.admin.header')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengajuan</title>

    <!-- Load jQuery, DataTables, and DataTables CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css"/>

    <!-- Load jExcel and jsuites for jExcel styling -->
    <script src="https://bossanova.uk/jexcel/v3/jexcel.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jexcel/v3/jexcel.css" type="text/css"/>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css"/>
</head>
<body>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h2 class="ui header">Pengajuan</h2>
                        <table class="table" id="pengajuan-table">
                    <thead>
                        <tr>
                            <th>Kode Pengajuan</th>
                            <th>ID Tim</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterasi data pengajuan di sini untuk menampilkan setiap baris -->
                        @foreach($dataPengajuan as $data)
                        <tr>
                            <td>{{ $data->kodePengajuan }}</td>
                            <td>{{ $data->tim->namaTim }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <!-- Button untuk merubah status -->
                                <button class="change-status" data-kodepengajuan="{{ $data->kodePengajuan }}">Ubah Status</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <script>
                $(document).ready(function() {
                    // Mengambil token CSRF dari meta tag
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $('#pengajuan-table').DataTable({
                        // Inisialisasi DataTables
                        // Tulis kode inisialisasi DataTables di sini
                    });

                    // Tambahkan event click pada button untuk merubah status
                    $('#pengajuan-table').on('click', '.change-status', function() {
                        var kodePengajuan = $(this).data('kodepengajuan');
                        
                        // Kirim permintaan AJAX dengan menyertakan token CSRF
                        $.ajax({
                            url: '/pengajuan/change-status/' + kodePengajuan,
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(response) {
                                // Tampilkan pesan sukses atau lakukan tindakan sesuai kebutuhan
                                alert(response.message);
                                console.log(response.pengajuan)
                                // Refresh tabel jika diperlukan
                                $('#pengajuan-table').DataTable().ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                // Tampilkan pesan error jika diperlukan
                                alert('Error: ' + error);
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
