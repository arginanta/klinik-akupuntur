<?php

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No. Rekammedis');
$sheet->setCellValue('B2', 'Nama Pasien');
$sheet->setCellValue('C2', 'Jenis Pelayanan');
$sheet->setCellValue('D2', 'Biaya Pokok');
$sheet->setCellValue('E2', 'Biaya Layanan');
$sheet->setCellValue('F2', 'Total');
$sheet->setCellValue('G2', 'Tanggal Input');

$data_finance = select("SELECT * FROM finance");

$start = 3;

foreach ($data_finance as $finance) {
    $sheet->setCellValue('A' . $start, $finance['id_rm'])->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $finance['nama_pasien'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $finance['jenis_pelayanan'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, "Rp." . number_format($finance['biaya_pokok'], 2, ',', '.'))->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, "Rp." . number_format($finance['biaya_layanan'], 2, ',', '.'))->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, "Rp." . number_format($finance['total'], 2, ',', '.'))->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, $finance['created_at'])->getColumnDimension('G')->setAutoSize(true);

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

$sheet->getStyle('A2:G' . $border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Keuangan Aksata Care.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Laporan Keuangan Aksata Care.xlsx"');
readfile('Laporan Keuangan Aksata Care.xlsx');
unlink('Laporan Keuangan Aksata Care.xlsx');
exit;