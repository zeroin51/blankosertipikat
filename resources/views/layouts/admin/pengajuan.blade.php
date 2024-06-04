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
                    @foreach($dataPengajuan as $data)
                    <tr>
                        <td>{{ $data->kodePengajuan }}</td>
                        <td>{{ $data->tim->namaTim }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <button class="change-status-export" data-kodepengajuan="{{ $data->kodePengajuan }}">ACC & Export</button>
                            <a href="{{ route('pengajuan.detail', ['kodePengajuan' => $data->kodePengajuan]) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $('#pengajuan-table').DataTable();

                    $('#pengajuan-table').on('click', '.change-status-export', function() {
                        var kodePengajuan = $(this).data('kodepengajuan');
                        
                        window.location.href = '/pengajuan/change-status-and-export/' + kodePengajuan;
                    });
                });
            </script>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
