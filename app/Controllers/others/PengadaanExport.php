<?php

namespace App\Controllers;

//memanggil model
use App\Models\PengadaanModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//memanggil package pdf
use Dompdf\Dompdf;

class PengadaanExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->PengadaanModel = new PengadaanModel();
    }

    function export_xls()
    {
        //select data from table barang
        $list = $this->PengadaanModel->select('id, nama_barang, jumlah, warranty, serial_number')->findAll();

        //filename
        $fileName = 'pengadaan_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'pengadaan')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'tahun')->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue('D1', 'laporan')->getColumnDimension('D')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A' . $line, $line - 1);
            $sheet->setCellValue('B' . $line, $row['pengadaan']);
            $sheet->setCellValue('C' . $line, $row['tahun']);
            $sheet->setCellValue('D' . $line, $row['laporan']);
            $line++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function export_pdf()
    {
        //select data from table buku
        $list = $this->PengadaanModel->select('id, pengadaan, tahun, laporan')->findAll();


        //filename
        $fileName = 'pengadaan_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('pengadaan_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }

}
