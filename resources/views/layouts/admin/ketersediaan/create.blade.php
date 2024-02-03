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
            <h2 class="ui header">Tambah Ketersediaan</h2>

            <form action="{{ route('ketersediaan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="seriBlanko">Seri Blanko</label>
                    <input type="text" class="form-control" id="seriBlanko" name="seriBlanko" required>
                </div>
                <div class="form-group">
                    <label for="totalBlanko">Total Blanko</label>
                    <input type="number" class="form-control" id="totalBlanko" name="totalBlanko" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Terpakai">Tidak Terpakai</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
