<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            border: 10px double black;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            text-align: center;
            margin-top: 40px;
            /* Aumenta el margen superior para evitar que se superponga con el banner */
        }

        .info-container {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
        }

        .info-value {
            margin-left: 10px;
        }

        .geometry img {
            width: 200px;
            position: relative;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .footer {
            background-color: #333;
            text-align: center;
            font-size: 12px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Contenido del banner fijo en la parte superior -->
        <h1>Informação FIPE</h1>
    </div>
    <h2></h2>
    <div class="info-container">
        <div class="info-item">
            <span class="info-label">Marca:</span>
            <span class="info-value">{{ $valor['Marca'] }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Modelo:</span>
            <span class="info-value">{{ $valor['Modelo'] }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Año:</span>
            <span class="info-value">{{ $valor['AnoModelo'] }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Valor FIPE:</span>
            <span class="info-value">{{ $valor['Valor'] }}</span>
        </div>
    </div>
    <div class="geometry">
        <img src="./img/banner.webp" alt="banner">
    </div>
    <div class="footer">
        <p>Fipe - Teste &copy;2023</p>
    </div>
</body>

</html>

<!-- 
    Funcionalidad:
    - Neste layout pdf, temos nosso template do nosso archivo PDF.
 -->