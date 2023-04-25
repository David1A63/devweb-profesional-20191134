<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <style>
    .formulario {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 20px;
    }

    .formulario__label {
        display: block;
        font-weight: 700;
        padding: 10px;
        cursor: pointer;
    }

    .formulario__grupo-input {
        position: relative;
    }

    .formulario__input {
        width: 100%;
        background: #fff;
        border: 3px solid transparent;
        border-radius: 3px;
        height: 45px;
        line-height: 45px;
        padding: 0 40px 0 10px;
        transition: .3s ease all;
    }

    .formulario__input:focus {
        border: 3px solid #0075FF;
        outline: none;
        box-shadow: 3px 0px 30px rgba(163,163,163, 0.4);
    }

    .formulario__input-error {
        font-size: 12px;
        margin-bottom: 0;
        display: none;
    }

    .formulario__input-error-activo {
        display: block;
    }

    .formulario__validacion-estado {
        position: absolute;
        right: 10px;
        bottom: 15px;
        z-index: 100;
        font-size: 16px;
        opacity: 0;
    }

    .formulario__checkbox {
        margin-right: 10px;
    }

    .formulario__grupo-terminos,
    .formulario__mensaje,
    .formulario__grupo-btn-enviar {
        grid-column: span 2;
    }

    .formulario__mensaje {
        height: 45px;
        line-height: 45px;
        background: #F66060;
        padding: 0 15px;
        border-radius: 3px;
        display: none;
    }

    .formulario__mensaje-activo {
        display: block;
    }

    .formulario__mensaje p {
        margin: 0;
    }

    .formulario__grupo-btn-enviar {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .formulario__btn {
        height: 45px;
        line-height: 45px;
        width: 30%;
        background: #000;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: .1s ease all;
    }

    .formulario__btn:hover {
        box-shadow: 3px 0px 30px rgba(163,163,163, 1);
    }

    .formulario__mensaje-exito {
        font-size: 14px;
        color: #119200;
        display: none;
    }

    .formulario__mensaje-exito-activo {
        display: block;
    }

    /* ----- -----  Estilos para Validacion ----- ----- */
    .formulario__grupo-correcto .formulario__validacion-estado {
        color: #1ed12d;
        opacity: 1;
    }

    .formulario__grupo-incorrecto .formulario__label {
        color: #bb2929;
    }

    .formulario__grupo-incorrecto .formulario__validacion-estado {
        color: #bb2929;
        opacity: 1;
    }

    .formulario__grupo-incorrecto .formulario__input {
        border: 3px solid #bb2929;
    }


    /* ----- -----  Mediaqueries ----- ----- */
    @media screen and (max-width: 800px) {
        .formulario {
            grid-template-columns: 1fr;
        }

        .formulario__grupo-terminos,
        .formulario__mensaje,
        .formulario__grupo-btn-enviar {
            grid-column: 1;
        }

        .formulario__btn {
            width: 100%;
        }
    }
    </style>
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i>Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Crear</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Artículos</h3>
    <div class="container-fluid bg-light rounded-3 mx-auto" style="width: 98%">
    <form id="formulario" action="/articulos" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <br>
            <div id="grupo__nombre" class="formulario__grupo mb-3">
                <label for="" class="formulario-label">Nombre</label>
                <div class="formulario__grupo-input">
                    <input id="nombre" name="nombre" type="text" value="" class="formulario__input" placeholder="Producto..." tabindex="1">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El nombre solo puede tener una extension de 2-30 caracteres y no se aceptan caracteres especiales.</p>
            </div>

            <div id="grupo__marca" class="formulario__grupo mb-3">
                <label for="" class="formulario-label">Marca</label>
                <div class="formulario__grupo-input">
                    <input id="marca" name="marca" type="text" class="formulario__input" placeholder="Marca..." value="" tabindex="2">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La marca solo puede tener una extension de 2-30 caracteres y no se aceptan caracteres especiales.</p>
            </div>

            <div id="grupo__categoria" class="formulario__grupo mb-3">
                <label for="" class="formulario-label">Categoria</label>
                <div class="formulario__grupo-input">
                    <input id="categoria" name="categoria" type="text" class="formulario__input" placeholder="Categoria..." value="" tabindex="3">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La categoria solo puede tener una extension de 2-30 caracteres y no se aceptan caracteres especiales.</p>
            </div>

            <div id="grupo__contenido" class="formulario__grupo mb-3">
                <label for="" class="formulario-label">Contenido</label>
                <div class="formulario__grupo-input">
                    <input id="contenido" name="contenido" type="text" class="formulario__input" placeholder="Contenido..." value="" tabindex="4">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El contenido solo puede tener una extension de 2-30 caracteres y no se aceptan caracteres especiales.</p>
            </div>

            <div id="grupo__precio" class="formulario__grupo mb-3">
                <label for="" class="formulario-label">Precio</label>
                <div class="formulario__grupo-input">
                    <input id="precio" name="precio" type="number" step="0.01" class="formulario__input" value="0.00"  tabindex="5">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El precio solo pueden ser valores con 2 decimales y no se aceptan caracteres especiales.</p>
            </div>

            <div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor, rellena el formulario correctamente. </p>
			</div>
            <br>

            <div>
                <a href="/articulos" class="btn btn-secondary" tabindex="6">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
            <br>
        </form>
    </div>
    <br><br>

    <script>
    //Comunicación Sincrona
    let formulario = document.getElementById('formulario');
    let inputs = document.querySelectorAll('#formulario input');

    let regex = {
        nombre: /^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/,
        marca: /^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/,
        categoria: /^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/,
        contenido: /^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/,
        precio: /^\d+(?:\.\d{1,2})?$/,
    };

    let campos = {
        nombre: false,
        marca: false,
        categoria: false,
        contenido: false,
        precio: false,
    };

    let validarFormulario = (e) => {
        switch(e.target.name){
            case "nombre":
                validarCampo(regex.nombre, e.target, 'nombre');
            break;
            case "marca":
                validarCampo(regex.marca, e.target, 'marca');
            break;
            case "categoria":
                validarCampo(regex.categoria, e.target, 'categoria');
            break;
            case "contenido":
                validarCampo(regex.contenido, e.target, 'contenido');
            break;
            case "precio":
                validarCampo(regex.precio, e.target, 'precio');
            break;
        }
    };

    let validarCampo = (expresion, input, campo) =>{
        if(expresion.test(input.value)){
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        }else{
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
    };

    inputs.forEach((input)=>{
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        if(campos.nombre && campos.marca && campos.categoria && campos.contenido && campos.precio){
            document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
            document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
            setTimeout(() => {
                document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
            }, 2000);
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono)=>{
                icono.classList.remove('formulario__grupo-correcto');
            });
            formulario.submit();
        }else{
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        }
    });

    </script>
@endsection
