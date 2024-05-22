@php

@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form Pdf</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg  bg-primary">
            <div class="container">
                <a class="navbar-brand text-white bold" href="#">Form Data</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <main>
        <div class="container pt-5">
            <div class="">
                <h6 style="text-transform:capitalize;" class="fw-bold">Form MAINTENANCE REQUEST & WORK ORDER </h6>
            </div>
            <form action="{{ route('simpan-laporan', $data->id ?? null) }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Tertuju</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="tertuju"
                        value="{{ isset($data->tertuju) ? $data->tertuju : null }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputSelect1" class="form-label fw-bold">Shift Dinas</label>
                    <select class="form-select form-select-sm" aria-label="Small select example"
                        id="exampleInputSelect1" name="shift_dinas">

                        @if (!empty($data->shift_dinas))
                            @if ($data->shift_dinas == 'Pagi')
                                <option value="Pagi" selected>Pagi</option>
                            @elseif ($data->shift_dinas == 'Siang')
                                <option value="Siang" selected>Siang</option>
                            @elseif ($data->shift_dinas == 'Malam')
                                <option value="Malam" selected>Malam</option>
                            @else
                                <option value="" selected>Select your options</option>
                            @endif
                        @else
                            <option value="" selected>Select your options</option>
                        @endif
                        <option value="Pagi">Pagi</option>
                        <option value="Siang">Siang</option>
                        <option value="Malam">Malam</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dropdown " class="fw-bold">Pilih Nama Pekerja</label>
                    <div class="dropdown" id="dropdown">

                        <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Nama
                        </button>
                        <ul class="dropdown-menu" style="padding-left: 4px;">
                            <li> <input class="form-check-input" type="checkbox" name="nama[]" value="Anji"
                                    id="dropdownCheck1">
                                <label class="form-check-label" for="dropdownCheck1">
                                    Anji
                                </label>
                            </li>
                            <li> <input class="form-check-input" type="checkbox" name="nama[]" value="Rudi"
                                    id="dropdownCheck1">
                                <label class="form-check-label" for="dropdownCheck1">
                                    Rudi
                                </label>
                            </li>
                            <li> <input class="form-check-input" type="checkbox" name="nama[]" value="Budi"
                                    id="dropdownCheck1">
                                <label class="form-check-label" for="dropdownCheck1">
                                    Budi
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="namaArray" id="namaArray">
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label fw-bold">Tanggal</label>
                    <input type="date" class="form-control" id="exampleInputEmail2" name="tanggal"
                        value="{{ isset($data->tanggal) ? $data->tanggal : null }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputSelect2" class="form-label fw-bold">Waktu</label>
                    <select class="form-select form-select-sm" aria-label="Small select example"
                        id="exampleInputSelect2" name="waktu">
                        @if (!empty($data->waktu))
                            @if ($data->waktu == '07.00 - 13.00')
                                <option value="{{ isset($data->waktu) ? $data->waktu : null }}" selected>07.00 -
                                    13.00
                                </option>
                            @elseif ($data->waktu == '13.00 - 19.00')
                                <option value="{{ isset($data->waktu) ? $data->waktu : null }}" selected>13.00 -
                                    19.00
                                </option>
                            @elseif ($data->waktu == '19.00 - 07.00')
                                <option value="{{ isset($data->waktu) ? $data->waktu : null }}" selected>19.00 -
                                    07.00
                                </option>
                            @else
                                <option value="" selected>select your options
                                </option>
                            @endif
                        @else
                            <option value="" selected>Select your options</option>
                        @endif


                        <option value="07.00 - 13.00">07.00 - 13.00</option>
                        <option value="13.00 - 19.00">13.00 - 19.00</option>
                        <option value="19.00 - 07.00">19.00 - 07.00</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="floatingTextarea1" class="fw-bold">Deskripsi Perintah</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 100px"
                            name="deskripsi_perintah">{{ $data->deskripsi_perintah ?? '' }}</textarea>
                        <label for="floatingTextarea1">List Task</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputSelect2 fw-bold" class="form-label fw-bold">Output</label>
                    <select class="form-select form-select-sm" aria-label="Small select example"
                        id="exampleInputSelect2" name="output">
                        @if (isset($data) && isset($data->output))
                            @if ($data->output == '1')
                                <option value="{{ $data->output ?? null }}" selected>Lembar Meter Reading</option>
                            @elseif ($data->output == '2')
                                <option value="{{ $data->output ?? null }}" selected>Status Peralatan</option>
                            @elseif ($data->output == '3')
                                <option value="{{ $data->output ?? null }}" selected>Pencatatan Logbook</option>
                            @else
                                <option value="{{ $data->output ?? null }}" selected>Choose Your Option</option>
                            @endif
                        @else
                            <option value="" selected>Choose Your Option</option>
                        @endif

                        <option value="1">Lembar Meter Reading</option>
                        <option value="2">Status Peralatan</option>
                        <option value="3">Pencatatan Logbook</option>
                    </select>
                </div>



                <div class="mb-3">
                    <label for="exampleInputEmail4" class="form-label">Jika tidak diatas maka Tuliskan dibawah</label>
                    <input type="text" class="form-control" id="exampleInputEmail4" name="output1"
                        value="">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail4" class="form-label fw-bold">Tertuju Manajer Teknik</label>
                    <input type="text" class="form-control" id="exampleInputEmail4" name="tujuan_manajer_teknik"
                        value="{{ $data->tujuan_manajer_teknik ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail5" class="form-label fw-bold">Tertuju Manajer Supervisor</label>
                    <input type="text" class="form-control" id="exampleInputEmail5"
                        name="tujuan_manajer_supervisor" value="{{ $data->tujuan_manajer_supervisor ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail6" class="form-label fw-bold">Tertuju Pelaksana</label>
                    <input type="text" class="form-control" id="exampleInputEmail6" name="nama_pelaksana_tujuan"
                        value="{{ $data->nama_pelaksana_tujuan ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail7" class="form-label fw-bold">Jam Mulai</label>
                    <input type="time" class="form-control" id="exampleInputEmail7" name="jam_mulai"
                        value="{{ $data->jam_mulai ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail8" class="form-label fw-bold">Jam Selesai</label>
                    <input type="time" class="form-control" id="exampleInputEmail8" name="jam_selesai"
                        value="{{ $data->jam_mulai ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputSelect3" class="form-label fw-bold">Status Pelaksanaan</label>
                    <select class="form-select form-select-sm" aria-label="Small select example"
                        id="exampleInputSelect3" name="status_pelaksanaan">
                        @if (!empty($data->status_pelaksanaan))

                            @if ($data->status_pelaksanaan == '1')
                                <option
                                    value="{{ isset($data->status_pelaksanaan) ? $data->status_pelaksanaan : null }}"
                                    selected>
                                    Selesai
                                </option>
                            @elseif ($data->status_pelaksanaan == '2')
                                <option
                                    value="{{ isset($data->status_pelaksanaan) ? $data->status_pelaksanaan : null }}"
                                    selected>Belum
                                    Selesai
                                </option>
                            @elseif ($data->status_pelaksanaan == '3')
                                <option
                                    value="{{ isset($data->status_pelaksanaan) ? $data->status_pelaksanaan : null }}"
                                    selected>Belum
                                    Selesai dilanjut shift berikutnya
                                </option>
                            @elseif ($data->status_pelaksanaan == '4')
                                <option
                                    value="{{ isset($data->status_pelaksanaan) ? $data->status_pelaksanaan : null }}"
                                    selected>Tidak Bisa Dilaksanakan
                                </option>
                            @else
                                <option value="" selected>select your options
                                </option>
                            @endif
                        @else
                            <option value="" selected>Select your options</option>
                        @endif

                        <option value="1">Selesai</option>
                        <option value="2">Belum Selesai</option>
                        <option value="3">Belum Selesai dilanjut shift berikutnya</option>
                        <option value="4">Tidak Bisa Dilaksanakan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea3" class="fw-bold">Catatan / Kendala</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px"
                            name="catatan_kendala">{{ $data->catatan_kendala ?? '' }}</textarea>
                        <label for="floatingTextarea3">List kendala</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea4" class="fw-bold">Usulan</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea4" style="height: 100px"
                            name="usulan">{{ $data->usulan ?? '' }}</textarea>
                        <label for="floatingTextarea4">List usulan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="floatingTextarea5" class="fw-bold">Catatan Pemberi Tugas</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea5" style="height: 100px"
                            name="catatan_pemberi_tugas">{{ $data->catatan_pemberi_tugas ?? '' }}</textarea>
                        <label for="floatingTextarea5">List catatan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail9" class="form-label fw-bold">Pelaksana Manajer Teknik</label>
                    <input type="text" class="form-control" id="exampleInputEmail9"
                        name="pelaksana_manajer_teknik" value="{{ $data->pelaksana_manajer_teknik ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail10" class="form-labelfw-bold fw-bold">Pelaksana Manajer
                        Supervisor</label>
                    <input type="text" class="form-control" id="exampleInputEmail10"
                        name="pelaksana_manajer_supervisor" value="{{ $data->pelaksana_manajer_supervisor ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail11" class="form-label fw-bold">Nama Pelaksana</label>
                    <input type="text" class="form-control" id="exampleInputEmail11" name="nama_pelaksana"
                        value="{{ $data->nama_pelaksana ?? '' }}">
                </div>

                <button type="submit"
                    onclick="if (!confirm('Apakah yakin data sudah benar?')) { event.preventDefault(); }"
                    class="btn btn-primary">Submit</button>
            </form>

        </div>
    </main>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Mendapatkan semua checkbox dengan nama "nama[]"
            var checkboxes = document.querySelectorAll('input[name="nama[]"]');

            // Array untuk menyimpan nilai yang dipilih
            var selectedNames = [];

            // Loop melalui setiap checkbox
            checkboxes.forEach(function(checkbox) {
                // Jika checkbox dicentang, tambahkan nilai ke dalam array selectedNames
                if (checkbox.checked) {
                    selectedNames.push(checkbox.value);
                }
            });

            // Ubah nilai dari elemen dengan ID "namaArray" menjadi nilai array yang dipilih
            document.getElementById('namaArray').value = JSON.stringify(selectedNames);
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
