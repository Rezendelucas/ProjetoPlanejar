<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Planejar</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div id="app">

    <nav class="text-center" id="nav-menu">
        <span>
            <a id="logo-nav">
                <img src="{{ asset('img/logo.svg') }}" id="logo-img">
            </a>
        </span>
        <span>
            <p id="nav-text">Teste de Programação Web</p>
        </span>
    </nav>
    <section id="form">
        <div class="row">
            <div class="col-3" id="form-table">
                <h4>Insira seu periodo de trabalho:</h4>
                <form action="/calculate_hours" method="get">
                    @csrf
                    <div class="mb-3" style="width: 10vw">
                        <label for="enterInput" class="form-label">Entrada:</label>
                        <input type="number" class="form-control" id="enterInput" name="enter">
                    </div>
                    <div class="mb-3" style="width: 10vw">
                        <label for="exitInput" class="form-label">Saida:</label>
                        <input type="number" class="form-control" id="exitInput" name="exit">
                    </div>
                    <button class="mybutton" type="submit">Calcular</button>
                </form>
            </div>

            <div class="col-9" id="result-table">
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Funcionario</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Duração</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jill</td>
                            <td>Diurno</td>
                            <td>05:42</td>
                        </tr>
                        <tr>
                            <td>Jill</td>
                            <td>Notunro</td>
                            <td>04:05</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>



</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
