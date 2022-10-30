<?php

require __DIR__.'/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_finance = select("SELECT * FROM finance");

$content .= '<style type="text/css">
    .gambar {
        width: 50px;
    }
</style>';

$content .= '
<page>
    <table border="1" align="center">
        <tr>
            <th>No. Rekammedis</th>
            <th>Nama Pasien</th>
            <th>Jenis Pelayanan</th>
            <th>Biaya Pokok</th>
            <th>Biaya Layanan</th>
            <th>Total</th>
            <th>Tanggal Input</th>
        </tr>';

        foreach ($data_finance as $finance) {
            $content .= '
                <tr>
                    <td>'.$finance['id_rm'].'</td>
                    <td>'.$finance['nama_pasien'].'</td>
                    <td>'.$finance['jenis_pelayanan'].'</td>
                    <td>'.$finance['biaya_pokok'].'</td>
                    <td>'.$finance['biaya_layanan'].'</td>
                    <td>'.$finance['total'].'</td>
                    <td>'.$finance['created_at'].'</td>
                </tr>';
        }

$content .= '
    </table>
</page>';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('laporan-keuangan.pdf');

?>