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
            <h2 class="ui header">Ketersediaan</h2>

            <a href="{{ route('ketersediaan.create') }}" class="btn btn-primary">Tambah Data Ketersediaan</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Seri Blanko</th>
                        <th>Total Blanko</th>
                        <th>Terpakai</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ketersediaans as $ketersediaan)
                        <tr>
                            <td>{{ $ketersediaan->seriBlanko }}</td>
                            <td>{{ $ketersediaan->totalBlanko }}</td>
                            <td>{{ $ketersediaan->terpakai }}</td>
                            <td>{{ $ketersediaan->status }}</td>
                            <td>
                                <a href="{{ route('ketersediaan.edit', $ketersediaan->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('ketersediaan.destroy', $ketersediaan->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
