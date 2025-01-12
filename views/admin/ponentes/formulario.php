<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre">Nombre</label>
        <input type="text"
        class="formulario__input"
        id="nombre"
        name="nombre"
        placeholder="Nombre Ponente"
        value="<?php echo $ponente->nombre ?? '' ?>"
        >
    </div>
    
    <div class="formulario__campo">
        <label for="apellido">Apellido</label>
        <input type="text"
        class="formulario__input"
        id="apellido"
        name="apellido"
        placeholder="Apellido Ponente"
        value="<?php echo $ponente->apellido ?? '' ?>"
        >
    </div>
    
    <div class="formulario__campo">
        <label for="ciudad">Ciudad</label>
        <input type="text"
        class="formulario__input"
        id="ciudad"
        name="ciudad"
        placeholder="Ciudad Ponente"
        value="<?php echo $ponente->ciudad ?? '' ?>"
        >
    </div>
    
    <div class="formulario__campo">
        <label for="pais">Pais</label>
        <input type="text"
        class="formulario__input"
        id="pais"
        name="pais"
        placeholder="Pais Ponente"
        value="<?php echo $ponente->pais ?? '' ?>"
        >
    </div>
    
    <div class="formulario__campo">
        <label for="imagen">Pais</label>
        <input type="file"
        class="formulario__input formulario__input--file"
        id="imagen"
        name="imagen"

        >
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>
    <div class="formulario__campo">
        <label for="tags_input">Areas de Experiencia (Separadas por coma)</label>
        <input type="text"
        class="formulario__input"
        id="tags_input"
        placeholder="Ej: Node.js, PHP, CSS, Laravel, UX / UI"
        >
    </div>
    <div id="tags" class="formulario__listado"></div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? '';?>">

    </fieldset>
