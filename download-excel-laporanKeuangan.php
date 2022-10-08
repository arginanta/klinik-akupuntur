<?php

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'No. RM');
$sheet->setCellValue('C2', 'Nama Pasien');
$sheet->setCellValue('D2', 'Jenis Pelayanan');
$sheet->setCellValue('E2', 'Biaya Pokok');
$sheet->setCellValue('F2', 'Total');
$sheet->setCellValue('G2', 'Tanggal Input');
$sheet->setCellValue('H2', 'Tanggal Input');

$data_finance = select("SELECT * FROM finance");

$no = 1;
$start = 3;

foreach ($data_finance as $finance) {
    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $finance['no_rm'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $finance['nama_pasien'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $finance['jenis_pelayanan'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, "Rp." . number_format($finance['biaya_pokok'], 2, ',', '.'))->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, "Rp." . number_format($finance['biaya_layanan'], 2, ',', '.'))->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, "Rp." . number_format($finance['total'], 2, ',', '.'))->getColumnDimension('G')->setAutoSize(true);
    $sheet->setCellValue('H' . $start, $finance['tanggal_input'])->getColumnDimension('H')->setAutoSize(true);

    $start++;
}

// table border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border = $start - 1;

$sheet->getStyle('A2:H' . $border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Keuangan Klinik.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Laporan Keuangan Klinik.xlsx"');
readfile('Laporan Keuangan Klinik.xlsx');
unlink('Laporan Keuangan Klinik.xlsx');
exit;