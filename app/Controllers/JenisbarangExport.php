<?php

namespace App\Controllers;

//memanggil model
use App\Models\JenisbarangModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//memanggil package pdf
use Dompdf\Dompdf;

class JenisbarangExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->JenisbarangModel = new JenisbarangModel();
    }

    function export_xls()
    {
        //select data from table barang
        $list = $this->JenisbarangModel->select('tb_jenisbarang.id, jenisbarang, tipe, pengadaan, warranty, jumlah, rakposisi, rakunit, serialnumber, ip, tb_merk.nama AS tb_merk_nama')->join('tb_merk', 'tb_jenisbarang.merk_id = tb_merk.id')->orderBy('tb_merk.id')->findAll();

        //filename
        $fileName = 'jenisbarang_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'jenisbarang')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'tb_merk_nama')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('D1', 'tipe')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('E1', 'pengadaan')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('F1', 'warranty')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('G1', 'jumlah')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('H1', 'rakposisi')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('I1', 'rakunit')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('J1', 'serialnumber')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('K1', 'ip')->getColumnDimension('B')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A' . $line, $line - 1);
            $sheet->setCellValue('B' . $line, $row['jenisbarang']);
            $sheet->setCellValue('C' . $line, $row['tb_merk_nama']);
            $sheet->setCellValue('D' . $line, $row['tipe']);
            $sheet->setCellValue('E' . $line, $row['pengadaan']);
            $sheet->setCellValue('F' . $line, $row['warranty']);
            $sheet->setCellValue('G' . $line, $row['jumlah']);
            $sheet->setCellValue('H' . $line, $row['rakposisi']);
            $sheet->setCellValue('I' . $line, $row['rakunit']);
            $sheet->setCellValue('J' . $line, $row['serialnumber']);
            $sheet->setCellValue('K' . $line, $row['ip']);
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
        $list = $this->JenisbarangModel->select('tb_jenisbarang.id, jenisbarang, tipe, pengadaan, warranty, jumlah, rakposisi, rakunit, serialnumber, ip, tb_merk.nama AS tb_merk_nama')->join('tb_merk', 'tb_jenisbarang.merk_id = tb_merk.id')->orderBy('tb_merk.id')->findAll();


        //filename
        $fileName = 'jenisbarang_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('jenisbarang_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }

}
