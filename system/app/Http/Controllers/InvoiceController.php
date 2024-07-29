<?php

namespace App\Http\Controllers;

// use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function generateInvoice($id)
    {
        $payment = Reservasi::findOrFail($id);

        // Hitung durasi menginap
        $checkIn = Carbon::parse($payment->tanggal_check_in);
        $checkOut = Carbon::parse($payment->tanggal_check_out);
        $durasiMenginap = $checkOut->diffInDays($checkIn);

        // Siapkan data invoice
        $data = [
            'company' => 'Penginapan Nur Aini',
            'address' => 'Jl. Penembahan Bandala, Kel. Mulia Baru, Kec. Delta Pawan, Kab. Ketapang, Kalimantan Barat 78813',
            'phone' => '+628225478989',
            'email' => 'nuraini@gmail.com',
            'customer' => [
                'name' => $payment->user->nama,
                'address' => $payment->user->alamat,
                'phone' => $payment->user->telepon,
                'email' => $payment->user->email
            ],
            'invoice' => [
                'number' => 'INV-' . str_pad($payment->id_reservasi, 5, '0', STR_PAD_LEFT),
                'date' => Carbon::today(),
                'due_date' => Carbon::today()->addDays(2),
                'items' => [],
                'subtotal' => 0, // Inisialisasi subtotal
                'total' => 0,    // Inisialisasi total
            ]
        ];

        // Iterasi setiap kamar untuk invoice
        foreach ($payment->kamars as $kamar) {
            $hargaKamar = $kamar->harga;
            $totalBiaya = $durasiMenginap * $hargaKamar; // Hitung total biaya untuk kamar ini

            // Tambahkan detail kamar ke dalam array 'items' invoice
            $data['invoice']['items'][] = [
                'description' => 'Kamar ' . $kamar->tipe_kamar . ' ' . $kamar->nomor_kamar,
                'dateIn' => $payment->tanggal_check_in,
                'dateOut' => $payment->tanggal_check_out,
                'price' => $hargaKamar,
                'total' => $totalBiaya,
            ];

            // Tambahkan total biaya kamar ke subtotal
            $data['invoice']['subtotal'] += $totalBiaya;
        }

        // Total akhir adalah subtotal
        $data['invoice']['total'] = $data['invoice']['subtotal'];

        // Render invoice menggunakan Dompdf
        $html = view('invoice', $data)->render();

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }
}
