@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

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
    <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />
</head>
<body>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
        <div id="spreadsheet"></div>
        <script>
        
        var datapengajuan = [
            ['', '', ''],
        ];
        
        var mySpreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
            data:datapengajuan,
            columns: [
                { type: 'text', title:'Nomor Berkas', width:120 },
                { type: 'text', title:'NIB', width:120 },
                { type: 'text', title:'namaDesa', width:120 },
                { type: 'numeric', title:'idTim', width:120 },
                { type: 'text', title:'jenisBerkas', width:120 },
                { type: 'numeric', title:'totalBidang', width:120 },
                { type: 'text', title:'rusakPengganti', width:120 },
                { type: 'text', title:'status', width:120 },
            ]
        }); 
        function ambilDataSpreadsheet() {
            var dataSpreadsheet = mySpreadsheet.getData();
            storeDataOnServer(dataSpreadsheet);
        }
        function storeDataOnServer(data) {
            // Gunakan AJAX untuk mengirim data ke server
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('pengajuan.store') }}",
                method: 'POST',
                data: { data: data },
                success: function(response) {
                    console.log('Data berhasil disimpan di server:', response);
                    // Lakukan sesuatu setelah data berhasil disimpan, jika diperlukan
                },
                error: function(error) {
                    console.error('Gagal menyimpan data di server:', error);
                    // Lakukan sesuatu jika terjadi kesalahan
                }
            });
        }
        </script>
        <button type="button" class="btn btn-success" onclick="ambilDataSpreadsheet()">Ambil Data</button>
        </div>
    </div>
</div>

@include('layouts.footer')
