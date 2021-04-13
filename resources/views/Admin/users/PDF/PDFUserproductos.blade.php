<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reporte Individual</title>
</head>
<style>
    @page {
        margin: 0px 0px;
        font-size: 1em;
    }

    body {
        margin-top: 2.5cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #03a9f4;
        color: white;
        text-align: center;
        line-height: 1.5cm;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #03a9f4;
        color: white;
        text-align: center;
        line-height: 1.5cm;
    }
</style>

<body>
    <header>
        <p>PDF Reporte Individual </p>
    </header>
    <footer>Sell It-DLM Developers</footer>
    <div class="container">
        <h2>Reporte Individual del Usuario: </h2>
        <hr>
        <p>Nombre: {{$user->name}} {{$user->apellidopaterno}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Numero telefonico: {{$user->numtelefonico}}</p>
        <p>Se unio: {{\FormatTime::LongTimeFilter($user->created_at) }}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Cantidad Disponible</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</th>
                    <td>{{$producto->nombre}}</th>
                    <td>Foto</th>
                    <td>{{$producto->precio}}</th>
                    <td>{{$producto->estado}}</th>
                    <td>{{$producto->garantia}}</th>
                    <td>{{$producto->noexistencia}}</th>
                    <td>{{$producto->descripcion}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>