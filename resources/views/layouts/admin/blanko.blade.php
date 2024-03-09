@include('layouts.admin.header')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan</title>

    <!-- Load jQuery and DataTables CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css"/>
</head>
<body>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h2 class="ui header">Pengajuan</h2>

            <div class="container">
                <table id="blanko-table" class="table">
                    <thead>
                        <tr>
                            <th>Nomor Blanko</th>
                            <th>Nomor Berkas</th>
                            <th>NIB</th>
                            <th>Nama Desa</th>
                            <th>ID Tim</th>
                            <th>Jenis Berkas</th>
                            <th>Rusak Pengganti</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blankos as $blanko)
                            <tr>
                                <td>{{ $blanko->nomorBlanko }}</td>
                                <td>{{ $blanko->nomorBerkas }}</td>
                                <td>{{ $blanko->nib }}</td>
                                <td>{{ $blanko->namaDesa }}</td>
                                <td>{{ $blanko->tim->namaTim }}</td>
                                <td>{{ $blanko->jenisBerkas }}</td>
                                <td>{{ $blanko->rusakPengganti }}</td>
                                <td>{{ $blanko->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#blanko-table').DataTable();
    });
</script>

@include('layouts.admin.footer')
