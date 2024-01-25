@include('layouts.admin.header')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h2 class="ui header">Daftar Pengajuan <span style="font-weight: normal; font-style: italic" id="status"></span></h2>

            <form action="{{ url('/pengajuan') }}" method="POST" id="formPengajuan">
                @csrf
                <input type="hidden" name="data" id="data">

                <!-- Step 1: Placeholder -->
                <div id="spreadsheet"></div>

                <div class="ui divider hidden"></div>
                <button type="submit">Simpan</button>
            </form>

            <!-- Step 2: Include Assets and Script -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://bossanova.uk/jexcel/v3/jexcel.js"></script>
            <link rel="stylesheet" href="https://bossanova.uk/jexcel/v3/jexcel.css" type="text/css"/>
            <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
            <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css"/>

            <script>
                $(function () {
                    $('#formPengajuan').submit(function (event) {
                        var dataPengajuan = $('#spreadsheet').jexcel('getData');
                        $('#data').val(JSON.stringify(dataPengajuan));
                    });

                    var data = {!! $dataPengajuan ? json_encode($dataPengajuan) : '[]' !!};

                    $('#spreadsheet').jexcel({
                        data: {!! json_encode(old('dataPengajuan', $dataPengajuan ?? [])) !!},
                        columns: [
                            // {type: 'text', readOnly: true, title: 'ID'},
                            {type: 'text', title: 'Nomor Berkas', width: 150},
                            {type: 'text', title: 'NIB', width: 100},
                            {type: 'text', title: 'Nama Desa', width: 200},
                            {type: 'numeric', title: 'Tim', width: 100},
                            {type: 'text', title: 'Jenis Berkas', width: 100},
                            {type: 'numeric', title: 'Total Bidang', width: 100},
                            {type: 'text', title: 'Rusak/Pengganti', width: 200},
                        ]
                    });

                    @if(!old('dataPengajuan') && $dataPengajuan->isEmpty())
                    $('#spreadsheet').jexcel('insertRow', 10, 0);
                    @endif

                    setInterval(sync, 10000);

                    function sync() {
                        var data = $('#spreadsheet').jexcel('getData');
                        $('#status').html('Saving...');

                        $.post("{{ url('/pengajuan') }}", {data: JSON.stringify(data), _token: "{{ csrf_token() }}"})
                            .done(function (data) {
                                $('#status').html('Saved');
                                $('#spreadsheet').jexcel('setData', data);
                            })
                            .fail(function () {
                                $('#status').html('Error');
                            })
                            .always(function () {
                                setTimeout(function () {
                                    $('#status').html('');
                                }, 3000)
                            });
                    }
                });

                
            </script>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
