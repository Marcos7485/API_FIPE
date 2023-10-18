@extends('layouts.main')
@section('title', 'Fipe Teste')

@section('content')
<div class="container">
    <div class="col-12 text-center header">
        <img src="/img/banner.webp" alt="banner" id="banner_img">
    </div>
    <div class="card">
        <form id="fipe-form">
            <table class="table text-center">
                <tr>
                    <td>Búsqueda</td>
                </tr>
                <tbody class="table_body">
                    <tr>
                        <td><label for="marca">Marca:</label></td>
                    </tr>

                    <tr>
                        <td>
                            <select id="marca" name="marca">
                                <option value="">Seleciona uma marca</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="modelo">Modelo:</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select id="modelo" name="modelo" disabled>
                                <option value="">Seleciona um modelo</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="ano">Ano:</label></td>
                    </tr>
                    <tr>
                        <td> <select id="ano" name="ano" disabled>
                                <option value="">Selecciona um ano</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success" type="button" id="buscar" disabled>Procurar Valor FIPE</button></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </div>

    <div id="resultado">
        <!-- Aquí se mostrará el resultado de la búsqueda -->
    </div>
</div>






@endsection

<!-- 
    Funcionalidad:
    - Neste layout inicio, temos nosso index ou pagina principal.
 -->