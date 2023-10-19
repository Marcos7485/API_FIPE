<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use App\Exports\FipeExport;
use Maatwebsite\Excel\Facades\Excel;

class VeiculosController extends Controller
{
    // obter a lista de marcas disponiveis
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

    // obter a lista de modelos da marca especificada
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

    // obter a lista de ano do modelo pesquisado
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

    // Obter Valor do veiculo pesquisado
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

    // Criação do archivo PDF
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

    // Criação do archivo XLSX
    public function generateXLSX($marcaCodigo, $modeloCodigo, $anoCodigo)
    {
        $client = new Client();
    
        $response = $client->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marcaCodigo}/modelos/{$modeloCodigo}/anos/{$anoCodigo}");
    
        if ($response->getStatusCode() === 200) {
            $valor = json_decode($response->getBody(), true);
    
        
            $export = new FipeExport([$valor]);
    
    
            return Excel::download($export, 'informacion_fipe.xlsx');
        }
    
        return response()->json(['error' => 'Error al obtener el valor'], 500);
    }
}


/*
Funcionalidad:
- Neste controller organizei as funções realizadas tanto na conexão com a API, como a criação de archivos PDF e XLSX para download.
- Utilizamos a biblioteca GuzzleHttp para facilitar as solicitudes HTTP
*/