{include 'templates/header.tpl'}

    <div class="container">
        
        <h1>{$titulo|upper}</h1>

        <h1>Nombre del Jugador:   {$jugador->jugador}</h1>
        <h1>Posicion del Jugador: {$jugador->posicion}</h1>
        <h1>Equipo del Jugador:   {$jugador->nombreEquipo}</h1>
        {if isset($jugador->imagen)}
            <img src="{$jugador->imagen}" class="img-fluid rounded border border-success"/>
        {/if}

        <a href='verJugadores'><button type="button" class="btn btn-info fixed-bottom btn-lg">Volver</button></a>
        
    </div>
    
{include 'templates/footer.tpl'}