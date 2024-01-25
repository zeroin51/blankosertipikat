@include('layouts.admin.header')

@include('layouts.admin.navbar')

@include('layouts.admin.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan</title>

    <!-- Load jQuery and jExcel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <!-- Step 1: Placeholder -->
    <div id="spreadsheet"></div>

    <!-- Step 2: Include Assets and Script -->
    <script>
        $(document).ready(function() {
            // Step 3: Convert Data from Controller to JSON
            var data = @json($dataPengajuan);

            // Step 4: Instantiate jExcel and Define Columns
            $('#spreadsheet').jexcel({
                data: data,
                columns: [
                    {type: 'text', title: 'Nomor Berkas', width: 150},
                    {type: 'text', title: 'NIB', width: 100},
                    {type: 'text', title: 'Nama Desa', width: 200},
                    {type: 'numeric', title: 'Tim', width: 100},
                    {type: 'text', title: 'Jenis Berkas', width: 100},
                    {type: 'numeric', title: 'Total Bidang', width: 100},
                    {type: 'text', title: 'Rusak/Pengganti', width: 200},
                ]
            });
        });
    </script>
    </div>
  </div>
</div>
@include('layouts.admin.footer')
