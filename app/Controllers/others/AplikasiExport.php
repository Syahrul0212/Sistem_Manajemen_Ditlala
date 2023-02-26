<?php

namespace App\Controllers;

//memanggil model
use App\Models\AplikasiModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//memanggil package pdf
use Dompdf\Dompdf;

class AplikasiExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->AplikasiModel = new AplikasiModel();
    }

    function export_xls()
    {
        //select data from table barang
        $list = $this->AplikasiModel->select('id, nama_aplikasi, username, password')->findAll();
        //filename
        $fileName = 'aplikasi_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'Nama aplikasi')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'Username')->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue('D1', 'Password')->getColumnDimension('D')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A' . $line, $line - 1);
            $sheet->setCellValue('B' . $line, $row['nama_aplikasi']);
            $sheet->setCellValue('C' . $line, $row['username']);
            $sheet->setCellValue('D' . $line, $row['password']);
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
        $list = $this->AplikasiModel->select('id, nama_aplikasi, username, password')->findAll();


        //filename
        $fileName = 'aplikasi_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('aplikasi_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }

}
