<?php

namespace App\Controllers;

//memanggil model
use App\Models\RakModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//memanggil package pdf
use Dompdf\Dompdf;

class RakExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->RakModel = new RakModel();
    }

    function export_xls()
    {
        //select data from table barang
        $list = $this->RakModel->select('id, rak_unit, rak_posisi')->findAll();

        //filename
        $fileName = 'rak_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'rak_unit')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'rak_posisi')->getColumnDimension('C')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A' . $line, $line - 1);
            $sheet->setCellValue('B' . $line, $row['rak_unit']);
            $sheet->setCellValue('C' . $line, $row['rak_posisi']);
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
        $list = $this->RakModel->select('id, rak_unit, rak_posisi')->findAll();


        //filename
        $fileName = 'rak_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('rak_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }

}
