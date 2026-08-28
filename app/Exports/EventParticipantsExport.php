<?php

namespace App\Exports;

use App\Models\Event;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EventParticipantsExport
{
    private const HEADERS = [
        'No', 'Nama', 'Email', 'NIK', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin',
        'Alamat', 'No. Handphone/WhatsApp', 'Pendidikan', 'Jurusan', 'Proses Uji',
        'Pekerjaan', 'Jabatan', 'Pangkat/Golongan', 'Alamat Rumah', 'Alamat Instansi',
        'Tujuan Mengikuti Sertifikasi', 'Skema Sertifikasi', 'Jenis Kepesertaan',
        'Asal Instansi', 'Keanggotaan IAPA', 'No. Anggota IAPA', 'Scan KTP',
        'Scan Ijazah', 'Surat Usulan Institusi', 'Tanggal Pendaftaran',
    ];

    public function make(Event $event): Spreadsheet
    {
        $event->load(['response.scheme']);

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator(config('app.name'))
            ->setTitle("Data Peserta - {$event->name}");

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Peserta');
        $lastColumn = Coordinate::stringFromColumnIndex(count(self::HEADERS));

        $sheet->mergeCells("A1:{$lastColumn}1");
        $sheet->setCellValue('A1', 'DATA PESERTA TERDAFTAR');
        $sheet->mergeCells("A2:{$lastColumn}2");
        $sheet->setCellValue('A2', $event->name);
        $sheet->fromArray(self::HEADERS, null, 'A3');

        $sheet->getStyle("A1:{$lastColumn}2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16)->getColor()->setARGB('FFFFFFFF');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(11)->getColor()->setARGB('FFFFFFFF');
        $sheet->getStyle("A1:{$lastColumn}2")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF97316');
        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(20);

        $headerStyle = $sheet->getStyle("A3:{$lastColumn}3");
        $headerStyle->getFont()->setBold(true)->getColor()->setARGB('FFFFFFFF');
        $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF1F4E78');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER)->setWrapText(true);
        $sheet->getRowDimension(3)->setRowHeight(34);

        foreach ($event->response as $index => $participant) {
            $row = $index + 4;
            $values = [
                $index + 1,
                $participant->name,
                $participant->email,
                $participant->nik,
                $participant->place_of_birth,
                $participant->date_of_birth,
                $participant->gender,
                $participant->address,
                $participant->phone,
                $participant->pendidikan,
                $participant->jurusan,
                $participant->proses_uji,
                $participant->pekerjaan,
                $participant->jabatan,
                $participant->pangkat_golongan,
                $participant->alamat_rumah,
                $participant->alamat_instansi,
                $participant->tujuan_sertifikasi,
                $participant->scheme?->name,
                $participant->kepesertaan,
                $participant->instansi_pengusul,
                $participant->keanggotaan_iapa,
                $participant->no_anggota_iapa,
                null,
                null,
                null,
                optional($participant->created_at)->format('Y-m-d H:i:s'),
            ];

            $sheet->fromArray(array_map(fn ($value) => $value ?? '-', $values), null, "A{$row}");

            // Identifiers must remain text so Excel does not remove leading zeroes.
            foreach (['D' => $participant->nik, 'I' => $participant->phone, 'W' => $participant->no_anggota_iapa] as $column => $value) {
                $sheet->setCellValueExplicit("{$column}{$row}", $value ?: '-', DataType::TYPE_STRING);
            }

            $this->addAttachment($sheet, "X{$row}", $participant->scan_ktp, 'uploads/ktp');
            $this->addAttachment($sheet, "Y{$row}", $participant->scan_ijazah, 'uploads/ijazah');
            $this->addAttachment($sheet, "Z{$row}", $participant->surat_usulan_institusi, 'uploads/surat_usulan');
            $sheet->getRowDimension($row)->setRowHeight(82);
        }

        $lastRow = max(3, $event->response->count() + 3);
        $sheet->setAutoFilter("A3:{$lastColumn}{$lastRow}");
        $sheet->freezePane('A4');
        $sheet->getStyle("A3:{$lastColumn}{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN)->getColor()->setARGB('FFD9E2F3');
        $sheet->getStyle("A4:{$lastColumn}{$lastRow}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setWrapText(true);
        $sheet->getStyle("A4:A{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        for ($columnIndex = 1; $columnIndex <= count(self::HEADERS); $columnIndex++) {
            $column = Coordinate::stringFromColumnIndex($columnIndex);
            $sheet->getColumnDimension($column)->setWidth(18);
        }
        foreach (['A' => 6, 'B' => 24, 'C' => 28, 'D' => 20, 'F' => 15, 'H' => 32, 'I' => 22,
                  'P' => 32, 'Q' => 32, 'R' => 32, 'S' => 38, 'X' => 20, 'Y' => 20, 'Z' => 20, 'AA' => 21] as $column => $width) {
            $sheet->getColumnDimension($column)->setWidth($width);
        }

        $sheet->getPageSetup()->setOrientation('landscape')->setFitToWidth(1)->setFitToHeight(0);

        return $spreadsheet;
    }

    private function addAttachment($sheet, string $cell, ?string $filename, string $directory): void
    {
        if (!$filename) {
            $sheet->setCellValue($cell, '-');
            return;
        }

        $relativePath = trim($directory, '/').'/'.basename($filename);
        $absolutePath = public_path($relativePath);
        $url = url('/'.$relativePath);

        $sheet->setCellValue($cell, $filename);
        $sheet->getCell($cell)->getHyperlink()->setUrl($url)->setTooltip('Buka atau unduh berkas');
        $sheet->getStyle($cell)->getFont()->getColor()->setARGB('FF0563C1');
        $sheet->getStyle($cell)->getFont()->setUnderline(true);

        if (!is_file($absolutePath) || !$this->isEmbeddableImage($absolutePath)) {
            return;
        }

        $drawing = new Drawing();
        $drawing->setName($filename);
        $drawing->setDescription($filename);
        $drawing->setPath($absolutePath);
        $drawing->setCoordinates($cell);
        $drawing->setOffsetX(8);
        $drawing->setOffsetY(5);
        $drawing->setHeight(95);
        $drawing->setWorksheet($sheet);
        $sheet->setCellValue($cell, '');
    }

    private function isEmbeddableImage(string $path): bool
    {
        $imageInfo = @getimagesize($path);

        return $imageInfo !== false && in_array($imageInfo[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF, IMAGETYPE_BMP], true);
    }
}
