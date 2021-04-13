@extends('layouts.app')
@section('content')
<section class="hero-nosotros mb-5">
</section>
<section class="info">
    <div class="container">
    <div class="row content-row">
        <div class="col-md-12 topmargin-lg">
            <div class="informacion">
                <h2 class="content-center">LA EMPRESA</h2>
                <p>The best trip es una empresa totalmente nueva, creada en el presente año
                ubicada en el centro de la ciudad.
                Desarrollada principalmente por nosotros, buscando satisfacer las necesidades del
                usuario para que pueda divertirse de una manera segura con los viajes
                experienciales o de cualquier otro tipo, donde puede adquirir varias opciones en
                diferentes ámbitos ya sea, trasporte, hospedaje y una gran variedad de paquetes
                que sin duda será de una gran utilidad al usuario.
                </p>
            </div>
        </div>
        <hr class="div-footer">
        <div class="col-sm-12 col-md-4 info-nosotros">
            <img src="https://image.flaticon.com/icons/png/512/1310/1310587.png">
            <div class="detalles-nosotros">
                <p>
                Viajaras de manera segura, poniendo a tu disposicion el transporte de tu mejor elección 
                incluido en tu pago inicial 
                </p>
            </div>
            </div>
                <div class="col-sm-12 col-md-4 info-nosotros">
                    <img src="https://image.flaticon.com/icons/png/512/1370/1370310.png">
                    <div class="detalles-nosotros">
                        <p>
                        Te daremos acceso a los mejores hoteles, para que vias tu experiencia de manera segura, 
                        con todo incluido 
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 info-nosotros">
                    <img src="https://image.flaticon.com/icons/png/512/1628/1628441.png">
                    <div class="detalles-nosotros">
                        <p>
                            Nos ponemos a tu servicio para que tengas la mejor experiencia de viajar y conocer México
                        </p>
                    </div>
                </div>
                <div class="col-md-12 contacto content-center">
                <form action="" method="Post" class="form-contacto">
                        <p class="h3 text-center"> Contactanos</p>
                        <div class="form-section ">
                            <br>
                            <input type="text" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="text" name="apellidos" placeholder="Apellidos">
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="text" name="correo" placeholder="Correo electrinico">
                        </div>
                        <div class="form-section">
                            <br>
                            <textarea class="Comentarios-contacto" name="comentarios" placeholder="Comentarios"></textarea>
                        </div>
                        <div class="form-section buscar">
                            <br>
                            <input type="submit" name="" value="Enviar" class="btn btn-blanco">
                        </div>
                        <br>
                    </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection