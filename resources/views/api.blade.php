@extends('templates.app')

@section('titulo', 'APIS')

@section('container')
<div class="card border-dark">
    <div class="card-header">
        [GET] BITACORA
    </div>
    <div class="card-body text-dark">
        <h5 class="card-title">
            <a href="/api/bitacora">
                https://transporter.azurewebsites.net/api/bitacora
            </a>
        </h5>
        <p class="card-text">
            Ruta la cual muestra todos los recorridos realizados.
        </p>
    </div>
</div>

<br/>

<div class="card border-dark">
    <div class="card-header">
        [GET] NUEVO RECORRIDO
    </div>
    <div class="card-body text-dark">
        <p class="card-text">
            El siguiente link agrega un nuevo recorrido, si la ruta va vacia se crea un recorrido con campos vacios:
            <br/>

            <a href="/api/nuevo-recorrido">
                https://transporter.azurewebsites.net/api/nuevo-recorrido
            </a>
            
            <br/>
            velocidad=0, distancia=0, peso=0, obstaculos=0, tiempo_espera_obs=0, tiempo_inicio=0, tiempo_fin=0
        </p>
        <hr/>
        <p class="card-text">
            Esta ruta puede crear nuevos recorridos con valores establecidos, como por ejemplo:
            <br/>
            <a href="/api/nuevo-recorrido?velocidad=10&peso=4">
                https://transporter.azurewebsites.net/api/nuevo-recorrido?velocidad=10&peso=4
            </a>
            <br/>
            Este ejemplo crea un nuevo recorrido con velocidad=10 y peso=4
        </p>
        <p class="card-text"><small class="text-muted">Los parametros pueden ir en cualquier orden.</small></p>
    </div>
</div>

<br/>

<div class="card border-dark">
    <div class="card-header">
        [GET] EDITAR RECORRIDO
    </div>
    <div class="card-body text-dark">
        <p class="card-text">
            El siguiente link edita un recorrido, si la ruta va vacia
            retorna el ultimo recorrido:
            <br/>
            <a href="/api/editar-recorrido">
                https://transporter.azurewebsites.net/api/editar-recorrido
            </a>
        </p>

        <p class="card-text">
            Esta ruta edita el ultimo recorrido con los parametros establecidos:
                <br/>
                <a href="/api/editar-recorrido?velocidad=10&peso=4">
                    https://transporter.azurewebsites.net/api/editar-recorrido?velocidad=10&peso=4
                </a>
                <br/>
                Este ejemplo edita el ultimo recorrido con velocidad=10 y peso=4
            </p>
            <p class="card-text"><small class="text-muted">Los parametros pueden ir en cualquier orden.</small></p>
    </div>
</div>

<br/>

<div class="card border-dark">
    <div class="card-header">
        [GET] TERMINAR RECORRIDO
    </div>
    <div class="card-body text-dark">
        <p class="card-text">
            Con esta ruta termina el recorrido:
            <a href="/api/terminar-recorrido">
                https://transporter.azurewebsites.net/api/terminar-recorrido
            </a>
        </p>
        <p class="card-text">
            Si la ruta viene vacia solamente retorna el ultimo registro, en el caso que
            que se le envie el parametro tiempo_final, este lo actualizara:

            <a href="/api/terminar-recorrido?tiempo_final=10">
                https://transporter.azurewebsites.net/api/terminar-recorrido?tiempo_final=10
            </a>
        </p>
    </div>
</div>

<br/>

<div class="card border-dark">
    <div class="card-header">
        [GET] RECORRIDO ACTUAL
    </div>
    <div class="card-body text-dark">
        <p class="card-text">
            Esta ruta retorna el recorrido actual:
            <a href="/api/recorrido-actual">
                https://transporter.azurewebsites.net/api/recorrido-actual
            </a>
        </p>
    </div>
</div>
<br/>

<div class="card border-dark">
    <div class="card-header">
        EJEMPLO
    </div>
    <div class="card-body text-dark">
        <p class="card-text">
            Pequeño ejemplo de como realizar un recorrido:
            <br/>
            Crear Recorrido
            <a href="/api/nuevo-recorrido?velocidad=10&peso=4&obstaculos=1&tiempo_espera_obs=0&tiempo_inicio=10">
                https://transporter.azurewebsites.net/api/nuevo-recorrido?velocidad=10&peso=4&obstaculos=1&tiempo_espera_obs=0&tiempo_inicio=10
            </a>
            <br/>
            Terminar Recorrido
            <a href="/api/terminar-recorrido?tiempo_fin=10">
                https://transporter.azurewebsites.net/api/terminar-recorrido?tiempo_fin=10
            </a>
            <br/>
        </p>
    </div>
</div>
<br/>

@endsection