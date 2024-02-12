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
                            <th>Updated At</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#blanko-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('blanko.index') }}",
                        columns: [
                            { data: 'nomorBlanko', name: 'nomorBlanko' },
                            { data: 'nomorBerkas', name: 'nomorBerkas' },
                            { data: 'nib', name: 'nib' },
                            { data: 'namaDesa', name: 'namaDesa' },
                            { data: 'tim.namaTim', name: 'tim.namaTim' }, // Mengakses relasi untuk mendapatkan namaTim
                            { data: 'jenisBerkas', name: 'jenisBerkas' },
                            { data: 'rusakPengganti', name: 'rusakPengganti' },
                            { data: 'created_at', name: 'created_at' }
                        ]
                    });
                });
            </script>
        </div>
    </div>
</div>
@include('layouts.admin.footer')
