<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="row mt-5 bg-primary p-5 rounded shadow-lg">

                <div class="title">
                    <h5 class="text-white font-weight-bold">Priview File</h5>
                </div>

                <div class="col-12 bg-white">
                    <div class=" p-2 mt-4 w-full">
                        <div class="flex justify-center">
                            <div class="title">
                                <h5>Yeah File Anda Sudah Siap</h5>
                                <p>Periksa Terlebih Dahulu !!</p>
                            </div>
                            <button type="button"
                                onclick="window.location.href='{{ route('home', ['id' => $data->id]) }}'"
                                class="btn btn-md btn-primary">Edit</button>
                            <button type="button"
                                onclick="window.location.href='{{ route('donwolad_pdf', ['id' => $data->id]) }}'"
                                class="btn btn-md btn-success">Donwolad</button>
                        </div>
                    </div>
                </div>
                <center>
                    <div class="row p-2 bg-white">
                        <div class=" w-full">
                            <iframe src="{{ route('generate-pdf', ['id' => $data->id]) }}" width="100%"
                                height="600px">
                                This browser does not support PDFs. Please download the PDF to view it: <a
                                    href="{{ route('generate-pdf', ['id' => $data->id]) }}">Download PDF</a>
                            </iframe>
                        </div>
                    </div>
                </center>

            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
