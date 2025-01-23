<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Evento</legend>
    <div class="formulario__campo">
        <label for="nombre">Nombre Evento</label>
        <input type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Evento"
            value="<?php echo $ponente->nombre ?? '' ?>">
    </div>
    <div class="formulario__campo">
        <label for="descripcion">Descripción</label>
        <textarea 
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripciçon Evento"
            rows="8"
            >
        </textarea>
    </div>
</fieldset>