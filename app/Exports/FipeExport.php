<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Support\Collection;

class FipeExport implements FromCollection, WithHeadings, WithEvents
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return new Collection($this->data);
    }

    public function headings(): array
    {
        return [
            'Tipo de Vehículo',
            'Valor FIPE',
            'Marca',
            'Modelo',
            'Año del Modelo',
            'Combustible',
            'Código Fipe',
            'Mes de Referencia',
            'Sigla del Combustible'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Estilo do titulo
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                        'color' => ['rgb' => 'FFFFFF'], 
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '006400',
                        ],
                    ],
                ]);

                // Aplicando estilo na linea A3 até K3
                $event->sheet->getStyle('A3:K3')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '808080',
                        ],
                    ],
                ]);

                $event->sheet->setCellValue('E3', 'Fipe Teste © 2023');              

            },
        ];
    }
}

/*
Funcionalidad:
- Utilizei a biblioteca "maatwebsite/excel": "^3.1", para a criação de archivo XLSX.
- Foi necessario instalar tambem o "phpoffice/phpspreadsheet": "^1.29".
- Neste codigo criei o template do archivo XLSX, junto a sua estrutura.
*/