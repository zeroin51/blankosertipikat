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
            ['', '', '', '', '', '', ''],
        ];
        
        var mySpreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
            data:datapengajuan,
            columns: [
                { type: 'text', title:'Nomor Berkas', width:120 },
                { type: 'text', title:'NIB', width:120 },
                { type: 'text', title:'Nama Desa', width:150 },
                { type: 'numeric', title:'Tim', width:120, },
                {
                    type: 'dropdown',
                    title:'Jenis Berkas',
                    width:120,
                    source:[
                        "PTSL",
                        "RUTIN",
                        "LINTOR",
                    ]
                },
                { type: 'numeric', title:'Total Bidang', width:120 },
                { type: 'text', title:'Rusak / Pengganti', width:150 },
            ]
        }); 
        function ambilDataSpreadsheet() {
            var dataSpreadsheet = mySpreadsheet.getData();
            var idTim = {{ auth()->user()->idTim }};
            // Ubah dataSpreadsheet untuk memasukkan idTim ke dalam data yang akan disimpan
            dataSpreadsheet.forEach(function(row) {
                row[3] = idTim;
            });
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
                    window.location.href = '/home';
                    // Lakukan sesuatu setelah data berhasil disimpan, jika diperlukan
                },
                error: function(error) {
                    console.error('Gagal menyimpan data di server:', error);
                    // Lakukan sesuatu jika terjadi kesalahan
                }
            });
        }
        </script>
        <button type="button" class="btn btn-success" onclick="ambilDataSpreadsheet()">Upload Data</button>
        </div>
    </div>
</div>

@include('layouts.footer')
