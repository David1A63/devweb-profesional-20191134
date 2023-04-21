<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item active text-light" aria-current="page"><i class="fas fa-home"></i> Inicio</li>
        </ol>
    </nav>
    <!--Llamando a la imagen-->
    <center><h3 class="text-white fw-bold">SuperMercado, el mejor lugar para comprar!!!</h3></center><br>
    <!--Carrusel-->
    <div class="container-slider">
        <div class="slider" id="slider">
            <div class="slider__section">
                <img src="{{ asset('img/super1.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super2.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super3.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super4.jpg')}}" alt="" class="slider__img">
            </div>
        </div>
        <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
        <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
    </div>
    <br><br>
    <center><h3 class="animado text-light fw-bold">Conoce algunas de nuestras promociones...</h3></center>
    <!--Eventos de Scroll-->
    <div class="contenedor">
        <div class="caja animado">
            <center><h5 class="text-light fw-bold">Compre $100 en Abarrotes y obtenga un descuento del 5%</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta1.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton1">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
            <center><h5 class="text-light fw-bold">Promoción de Productos de Aseo 2x3</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta2.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton2">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Venga al martes verde y obtenga descuentos en frutas y verduras</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta3.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton3">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Obten $100 en tu tarjeta de puntos por cada $1000</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta4.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton4">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Descuentos en el miercoles de carnes de hasta el 20%</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta5.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton5">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Encuentra tu próximo par de tenis...</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta6.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton6">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Encuentra las mejores y mayor variedad de botanas</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta7.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton7">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
        <div class="caja animado">
        <center><h5 class="text-light fw-bold">Encuentra un antojo en nuestra fuente de sodas</h5></center>
            <div>
                <center><img src="{{ asset('img/tarjeta8.jpg')}}" alt="" class="" width="200" height="200"></center>
            </div>
            <div>
                <br>
                <center>
                    <button id="miBoton8">
                        Ver más...
                    </button>
                </center>
            </div>
        </div>
    </div>
    <br><br>
@stop

@section('jsAdicional')
    <!--Chat en Vivo-->
    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/7679b7948b824f788cfbe8d546b3be8f1035f1c473454a56a452c52f7d3edaf8.js"></script>
@stop
