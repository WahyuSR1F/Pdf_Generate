<?php
$data->nama = explode(',', $data->nama);

$expectedValues = ['1', '2', '3'];
// Fungsi untuk memeriksa apakah nilai ada dalam array output
function isChecked($value, $data)
{
    return in_array($value, explode(',', $data->output)) ? 'checked' : '';
}

// Memecah output menjadi array
$outputArray = explode(',', $data->output);

// Mencari nilai yang tidak diharapkan
$unexpectedValues = array_diff($outputArray, $expectedValues);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>
    <style type="text/css">
        @page {
            margin: 100px 25px 50px;
        }

        .main {
            margin: 100px 25px 50px;
        }

        .container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .main-table {
            width: 100%;
            height: 100%;
            margin: 0.1px;
            border-collapse: collapse;
        }

        .main-table td {
            border: 0.1px solid black;
        }

        .logo-container {
            display: flex;
            justify-content: space-around;

        }



        .logo {
            width: 50px;
        }

        .title {
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            line-height: 30px;
        }

        .subtitle {
            font-size: 15px;
        }

        .shif-dinas {
            text-transform: capitalize;
            margin-left: 5px;
        }

        .date-time {
            margin-left: 5px;
        }

        .date-time table {
            border: none;
        }

        .date-time table td {
            border: none;
        }

        .output-options {
            display: flex;
            justify-content: space-around;
        }

        .output-label {
            margin-right: 5px;
        }

        .signature-row {
            height: 50px;
        }

        .signature-container {
            display: flex;
            justify-content: space-around;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .signature-box {
            width: 100%;
            margin: 0px;
            height: 100%;
            padding-top: 30px;
            padding-bottom: 30px;
            text-align: center;
            line-height: 0;
        }

        .signature-line {
            margin-bottom: 0px;
            margin-top: 50px;
        }

        .empty-row {
            width: 10px;
        }

        .text-center {
            text-align: center;
        }

        .status-options {
            display: flex;
            justify-content: space-around;
            border-collapse: collapse;

        }

        .notes {
            width: 100%;
            margin: 5px;
            padding: 5px;
            word-break: break-word;
            margin-right: 5px;
        }

        .perintah {
            margin-left: 5px;
            word-break: break-word;
        }

        .perintah p {
            margin-left: 5px;
            word-break: break-word;
        }

        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-bottom: 5px;
            margin-left: 2px;
            border: 1px solid #000;
            margin-right: 5px;
            vertical-align: middle;
            border-radius: 50%;

        }

        .checkbox.checked {
            background-color: #000;
        }

        .checkbox-label {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="p-2">
                <table cellspacing="0" cellpadding="0" class="main-table">
                    <tr>
                        <td colspan="1" style="border-right: none">
                            <center>
                                <div class="logo-container">
                                    <span>
                                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('asset/img/Logo-AirNav.PNG'))) }}"
                                            width="120" alt="logo">
                                    </span>
                                </div>
                            </center>


                        </td>
                        <td colspan="1" style="border-left: none">
                            <h5 style="font-weight: 700;">Unit Kediri</h5>
                        </td>
                        <td colspan="3">
                            <p class="title">MAINTENANCE REQUEST & WORK ORDER</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <center>
                                <p class="subtitle">Tertuju : <span
                                        style="margin-left: 4px;">{{ $data->tertuju }}</span></p>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" style="border-right: none; position: relative; padding:0;">
                            <div style="position: absolute; top: 0; width: 100%; margin-top:2px;">
                                <div style="display: flex; flex-direction: column;">
                                    <p style="margin: 0;">Shif Dinas/Nama: <span>{{ $data->shift_dinas ?? '' }}/</span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td colspan="1" style="border-left: none; padding: 0;">
                            <div
                                style="display: flex; justify-content: space-between; width: 100%; box-sizing: border-box; margin-left: 10px;">
                                <div>
                                    @if (!empty($data->nama))
                                        @foreach ($data->nama as $item)
                                            <p style="margin: 0;">{{ $item }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="date-time">
                                <table>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>{{ $data->tanggal ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam</td>
                                        <td>:</td>
                                        <td>{{ $data->waktu ?? '' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="perintah">
                            <p style="margin-left:15px; margin-bottom:0px;">Deskripsi Perintah</p>
                            @php
                                $deskripsi = explode("\n", $data->deskripsi_perintah);
                            @endphp
                            <div style="margin-left: 15px; margin-bottom: 5px; line-height:-1px;">
                                @foreach ($deskripsi as $item)
                                    <p style="margin: 0;">{{ $item }}</p>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="status-options">
                                <label for="" style="margin-left:10px;">Status Pelaksanaan :</label>

                                <span class="checkbox {{ isChecked('1', $data) }}" id="status1"></span>
                                <label for="status1">Lembar Meter Reading</label>

                                <span class="checkbox {{ isChecked('2', $data) }}" id="status2"></span>
                                <label for="status2">Status Peralatan</label>

                                <span class="checkbox {{ isChecked('3', $data) }}" id="status3"></span>
                                <label for="status3">Pencatatan Logbook</label>

                                @if (!empty($unexpectedValues))
                                    <!-- Hapus salah satu dari elemen di bawah yang memiliki id ganda -->
                                    <span class="checkbox checked " id="status4"></span>
                                    <label for="status4">{{ $data->output }}</label>
                                @else
                                    <span class="checkbox " id="status4"></span>
                                    <label for="status3">..................</label>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr style="border: 0px">
                        <td colspan="5" class="signature-row">
                            <table cellspacing="0" cellpadding="0"
                                style="width: 100%; margin:0; padding:0; height:100%; border-collapse:collapse;">
                                <tr>
                                    <td>
                                        <div class="signature-box">
                                            <p>Manager Teknik</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->tujuan_manajer_teknik }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="signature-box">
                                            <p>Manager Supervisor</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->tujuan_manajer_supervisor }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="signature-box">
                                            <p>Pelaksana</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->nama_pelaksana_tujuan }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="empty-row">
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p class="text-center">Pelaksana <span
                                    style="margin-left: 2px">{{ $data->nama_pelaksana_tujuan }}</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p style="margin-left: 5px"> Jadwal Mulai : {{ $data->jam_mulai }}</p>
                        </td>
                        <td colspan="3">
                            <p style="margin-left: 5px"> Jadwal Selesai : {{ $data->jam_selesai }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height: 2px;">
                            <div class="status-options">
                                <label for="" style="margin-left:10px;">Status Pelaksanaan :</label>

                                <span
                                    class="checkbox {{ in_array('1', explode(',', $data->status_pelaksanaan)) ? 'checked' : '' }}"
                                    id="status1"></span>
                                <label for="status1">Selesai</label>

                                <span
                                    class="checkbox {{ in_array('2', explode(',', $data->status_pelaksanaan)) ? 'checked' : '' }}"
                                    id="status2"></span>
                                <label for="status2">Belum Selesai</label>

                                <span
                                    class="checkbox {{ in_array('3', explode(',', $data->status_pelaksanaan)) ? 'checked' : '' }}"
                                    id="status3"></span>
                                <label for="status3">Belum Selesai dilanjut shift berikutnya</span></label>

                                <span
                                    class="checkbox {{ in_array('4', explode(',', $data->status_pelaksanaan)) ? 'checked' : '' }}"
                                    id="status4"></span>
                                <label for="status4">Tidak bisa dilaksanakan</label>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="notes">
                                <p style="margin-bottom: 0px">Catatan/Kendala :</p>
                                @php
                                    $deskripsi = explode("\n", $data->catatan_kendala);
                                @endphp
                                <div style="margin: 2px; word-break: break-word;">
                                    @foreach ($deskripsi as $item)
                                        <p style="margin:0px;">{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="notes">
                                <p style=" margin-bottom:0px">Usulan</p>
                                @php
                                    $deskripsi = explode("\n", $data->usulan);
                                @endphp
                                <div style="margin: 2px; margin-bottom:0px word-break: break-word;">
                                    @foreach ($deskripsi as $item)
                                        <p style="margin:0px;">{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="notes">
                                <p style=" margin-bottom:0px">Catatan Pemberi Tugas :</p>
                                @php
                                    $deskripsi = explode("\n", $data->catatan_pemberi_tugas);
                                @endphp
                                <div
                                    style="margin: 2px; margin-bottom:10px; word-break: break-word; overflow-wrap: break-word; overflow: auto;">
                                    @foreach ($deskripsi as $item)
                                        <p style="margin:0px;">{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="signature-row">
                            <table cellspacing="0" cellpadding="0"
                                style="width: 100%; margin:0; padding:0; height:100%; border-collapse:collapse;">
                                <tr>
                                    <td>
                                        <div class="signature-box">
                                            <p>Manager Teknik</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->pelaksana_manajer_teknik }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="signature-box">
                                            <p>Manager Supervisor</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->pelaksana_manajer_supervisor }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="signature-box">
                                            <p>Pelaksana</p>
                                            <div style="height: 20px"></div>
                                            <p class="signature-line">{{ $data->nama_pelaksana }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>

    <!-- Link ke file JavaScript eksternal -->
    <script src="{{ asset('asset/js/document.js') }}"></script>

</body>
</body>

</html>
