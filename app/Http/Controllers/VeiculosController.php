<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use App\Exports\FipeExport;
use Maatwebsite\Excel\Facades\Excel;

class VeiculosController extends Controller
{
    public function getMarcas()
    {
        $client = new Client();

        $response = $client->get('https://parallelum.com.br/fipe/api/v1/carros/marcas');

        if ($response->getStatusCode() === 200) {
            $marcas = json_decode($response->getBody(), true);
            return response()->json($marcas);
        }

        return response()->json(['error' => 'Error al obtener las marcas'], 500);
    }

    public function getModelos($marcaCodigo)
    {
        $client = new Client();

        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos");

        if ($response->getStatusCode() === 200) {
            $modelos = json_decode($response->getBody(), true);
            return response()->json($modelos);
        }

        return response()->json(['error' => 'Error al obtener los modelos'], 500);
    }

    public function getAnos($marcaCodigo, $modeloCodigo)
    {
        $client = new Client();

        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos/{$modeloCodigo}/anos");

        if ($response->getStatusCode() === 200) {
            $anos = json_decode($response->getBody(), true);
            return response()->json($anos);
        }

        return response()->json(['error' => 'Error al obtener los años'], 500);
    }

    public function getValor($marcaCodigo, $modeloCodigo, $anoCodigo)
    {
        $client = new Client();

        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos/{$modeloCodigo}/anos/{$anoCodigo}");

        if ($response->getStatusCode() === 200) {
            $valor = json_decode($response->getBody(), true);
            return response()->json($valor);
        }

        return response()->json(['error' => 'Error al obtener el valor'], 500);
    }

    public function generatePDF($marcaCodigo, $modeloCodigo, $anoCodigo)
    {
        $client = new Client();

        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos/{$modeloCodigo}/anos/{$anoCodigo}");

        if ($response->getStatusCode() === 200) {
            $valor = json_decode($response->getBody(), true);


            $pdf = $pdf = App::make('dompdf.wrapper');

            $pdf->loadView('pdf.template', ['valor' => $valor]);

            return $pdf->download('informacion_fipe.pdf');
        }

        return response()->json(['error' => 'Error al obtener el valor'], 500);
    }

    public function generateXLSX($marcaCodigo, $modeloCodigo, $anoCodigo)
    {
        $client = new Client();
    
        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos/{$modeloCodigo}/anos/{$anoCodigo}");
    
        if ($response->getStatusCode() === 200) {
            $valor = json_decode($response->getBody(), true);
    
            // Crea una instancia de la clase de exportación y pasa los datos
            $export = new FipeExport([$valor]);
    
            // Exporta los datos a XLSX
            return Excel::download($export, 'informacion_fipe.xlsx');
        }
    
        return response()->json(['error' => 'Error al obtener el valor'], 500);
    }
}


/*
Funcionalidad:
- Neste controller organizei as funções realizadas tanto na conexão com a API, como a criação de archivos PDF e XLSX para download.

*/