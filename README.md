# Documentação do Projeto - Sistema de Consulta FIPE

## Descrição do Projeto

Este projeto consiste em um sistema de consulta de valores de veículos no Brasil usando uma API externa da FIPE. Ele permite que os usuários pesquisem e obtenham informações detalhadas sobre o valor de veículos no mercado.

## Estrutura de Arquivos

### Arquivos PHP

- **app\Exports\FipeExport.php**: Neste arquivo, utilizamos a biblioteca "maatwebsite/excel" juntamente com o "phpoffice/phpspreadsheet" para criar arquivos XLSX. Além disso, criamos o modelo de arquivo XLSX e sua estrutura.

- **app\Http\Controllers\Main.php**: Este controlador contém a organização das visualizações da página e, neste projeto, há apenas uma visualização.

- **app\Http\Controllers\VeiculosController.php**: Neste controlador, organizamos as funções relacionadas à conexão com a API, bem como a criação de arquivos PDF e XLSX para download.

### Arquivos de Modelos

- **app\Models**: Não foi criado nenhum modelo, pois o projeto não requer conexão a um banco de dados.

### Arquivos Públicos

- **public**: Neste diretório, os arquivos de estilo (CSS), scripts e recursos, como imagens usadas no projeto, estão organizados.

### Arquivos de Estilo

- **public\css\styles.css**: Neste arquivo, estão todos os estilos aplicados à página.

### Visualizações

- **resources\views\inicio.blade.php**: Esta visualização representa a página inicial ou índice do projeto.

- **resources\views\layouts\main.blade.php**: Neste layout, você encontrará a estrutura HTML juntamente com os cabeçalhos e scripts usados. Também incorporamos o Bootstrap para funcionalidades responsivas e estilos em HTML.

- **resources\views\pdf\template.blade.php**: Este layout contém o modelo para a geração de arquivos PDF.

## Funcionalidade do Projeto

O projeto permite que os usuários realizem consultas de valores de veículos no mercado brasileiro usando uma API da FIPE. Algumas das funcionalidades principais são:

- Pesquisa e consulta de informações sobre valores de veículos.
- Geração de arquivos XLSX para baixar as informações consultadas.
- Geração de arquivos PDF com modelos predefinidos.

O projeto foi estruturado de forma eficiente para oferecer uma experiência de usuário fácil de usar e funcional.

**Observação**: Esta documentação fornece uma visão geral da estrutura do projeto e de suas funcionalidades. É recomendável consultar o código-fonte para obter detalhes técnicos adicionais e configurações específicas do projeto.

