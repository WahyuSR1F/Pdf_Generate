<?php

namespace App\Http\Controllers;



use Mpdf\Mpdf;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Validation\ValidationException;


class LoadPdfController extends Controller
{

    public function generatePdf($id)
    {
        $laporan  = Laporan::where('id', $id)->first();


        // return view('coba', ['data' => $laporan]);

        $pdf = PDF::loadView('coba', ['data' => $laporan]);
        return $pdf->inline('document' . date('Y-m-s') . '.pdf');
    }


    public function simpanLaporan(Request $request, $id = null)
    {

        try {
            $validatedData = $request->validate([
                'tertuju' => 'nullable',
                'shift_dinas' => 'nullable',
                'nama' => 'nullable',
                'tanggal' => 'nullable|date',
                'waktu' => 'nullable',
                'deskripsi_perintah' => 'nullable',
                'output' => 'nullable',
                'output1' => 'nullable',
                'tujuan_manajer_teknik' => 'nullable',
                'tujuan_manajer_supervisor' => 'nullable',
                'nama_pelaksana_tujuan' => 'nullable',
                'jam_mulai' => 'nullable',
                'jam_selesai' => 'nullable',
                'status_pelaksanaan' => 'nullable',
                'catatan_kendala' => 'nullable',
                'usulan' => 'nullable',
                'catatan_pemberi_tugas' => 'nullable',
                'pelaksana_manajer_teknik' => 'nullable',
                'pelaksana_manajer_supervisor' => 'nullable',
                'nama_pelaksana' => 'nullable',
            ]);


            $validatedData['nama'] = implode(',', $request->nama);
            if ($request->output1) {
                $validatedData['output'] = $request->output1;
            }




            if ($id) {
                $laporan =  Laporan::where('id', $id)->first();
                $laporan->update($validatedData);
            } else {
                $laporan =  Laporan::create($validatedData);
            }



            // Process the validated data

            return view('priview', ['data' => $laporan]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return view('error', ['errorMessage' => $e->getMessage()]);
        }
    }

    public function Donwolad(Request $request, $id)
    {
        try {
            $laporan = Laporan::where('id', $id)->first();
            $pdf = PDF::loadView('coba', ['data' => $laporan]);
            $pdf->download('document.pdf');
            return redirect()->back();
        } catch (\Exception $e) {
            return view('error', ['errorMessage' => $e->getMessage()]);
        }
    }
}