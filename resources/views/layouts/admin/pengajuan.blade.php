@include('layouts.admin.header')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <!-- Display Data using DataTables -->
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>Nomor Berkas</th>
                        <th>NIB</th>
                        <th>Nama Desa</th>
                        <th>Tim</th>
                        <th>Jenis Berkas</th>
                        <th>Total Bidang</th>
                        <th>Rusak/Pengganti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPengajuan as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->nomorBerkas }}</td>
                            <td>{{ $pengajuan->nib }}</td>
                            <td>{{ $pengajuan->namaDesa }}</td>
                            <td>{{ $pengajuan['tim']['namaTim'] }}</td>
                            <td>{{ $pengajuan->jenisBerkas }}</td>
                            <td>{{ $pengajuan->totalBidang }}</td>
                            <td>{{ $pengajuan->rusakPengganti }}</td>
                            <!-- Add other columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- DataTables Initialization Script -->
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>
@include('layouts.admin.footer')
