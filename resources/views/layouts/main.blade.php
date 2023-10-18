<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
</head>

<body class="antialiased">
    @yield('content')
    <footer>
        <p id="footer"> Fipe Teste &copy; 2023</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Llena las opciones de marca al cargar la página usando la ruta definida en Laravel
            $.get('/marcas', function(data) {
                data.forEach(function(marca) {
                    $('#marca').append($('<option>', {
                        value: marca.codigo,
                        text: marca.nome
                    }));
                });
            });

            $('#marca').change(function() {
                var marcaCodigo = $(this).val();
                if (marcaCodigo !== '') {
                    $('#modelo').prop('disabled', false);
                    $('#modelo').html('<option value="">Cargando...</option>');
                    $.get('/modelos/' + marcaCodigo, function(data) {
                        $('#modelo').html('<option value="">Selecciona un modelo</option>');
                        data.modelos.forEach(function(modelo) {
                            $('#modelo').append($('<option>', {
                                value: modelo.codigo,
                                text: modelo.nome
                            }));
                        });
                    });
                } else {
                    $('#modelo').prop('disabled', true);
                    $('#modelo').html('<option value="">Selecciona un modelo</option>');
                }
            });

            $('#modelo').change(function() {
                var modeloCodigo = $(this).val();
                if (modeloCodigo !== '') {
                    $('#ano').prop('disabled', false);
                    $('#ano').html('<option value="">Cargando...</option>');
                    $.get('/anos/' + $('#marca').val() + '/' + modeloCodigo, function(data) {
                        $('#ano').html('<option value="">Selecciona un año</option>');
                        data.forEach(function(ano) {
                            $('#ano').append($('<option>', {
                                value: ano.codigo,
                                text: ano.nome
                            }));
                        });
                    });
                } else {
                    $('#ano').prop('disabled', true);
                    $('#ano').html('<option value="">Selecciona un año</option>');
                }
            });

            $('#ano').change(function() {
                var anoCodigo = $(this).val();
                if (anoCodigo !== '') {
                    $('#buscar').prop('disabled', false);
                } else {
                    $('#buscar').prop('disabled', true);
                }
            });

            $('#buscar').click(function() {
                var marcaCodigo = $('#marca').val();
                var modeloCodigo = $('#modelo').val();
                var anoCodigo = $('#ano').val();
                var tabla = document.getElementById("fipe-form");

                if (marcaCodigo && modeloCodigo && anoCodigo) {
                    $.get('/valor/' + marcaCodigo + '/' + modeloCodigo + '/' + anoCodigo, function(data) {
                        $('#resultado').html('<b>Marca:</b> ' + data.Marca + '<br><b>Modelo:</b> ' + data.Modelo + '<br><b>Año:</b> ' + data.AnoModelo + '<br><b>Valor FIPE:</b> ' + data.Valor);

                        // Agrega un enlace para descargar el PDF
                        var pdfLink = '<a href="/generate-pdf/' + marcaCodigo + '/' + modeloCodigo + '/' + anoCodigo + '">Descargar PDF</a>';
                        var xlsxLink = '<a href="/generate-XLSX/' + marcaCodigo + '/' + modeloCodigo + '/' + anoCodigo + '">Descargar XLSX</a>';
                        var voltarLink = '<a href="/"><button class="btn btn-success">Fazer nova consulta</button></a>';
                        $('#resultado').append('<p>' + pdfLink + '</p>');
                        $('#resultado').append('<p>' + xlsxLink + '</p>');
                        $('#resultado').append('<p>' + voltarLink + '</p>');
                    }).fail(function() {
                        $('#resultado').html('Error al obtener el valor.');
                    });
                } else {
                    $('#resultado').html('Por favor, selecciona marca, modelo y año antes de buscar.');
                }

                
                tabla.style.transition = "opacity 2s"; 
                // Aplicar una transición de 2 segundos a la propiedad de opacidad

                // Desvanecer la tabla gradualmente
                tabla.style.opacity = 0;

                // Esperar 2 segundos antes de mostrar el div
                setTimeout(function() {
                    var div = document.getElementById("resultado");
                    div.style.transition = "opacity 2s"; // Aplicar una transición de 2 segundos a la propiedad de opacidad
                    div.style.opacity = 1; // Hacer que el div aparezca gradualmente
                }, 2000);
            });
        });
    </script>
</body>

</html>


<!-- 
    Funcionalidad:
    - Neste layout main, temos nossa estrutura HTML junto aos headers e scripts utilizados.
    - Ruta de Bootstrap para funcionalidades responsivas e estilos em HTML.
 -->