<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <?php 
    require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form class="formulario" method="POST" action="/registro">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input
                type="text"
                class="formulario__input"
                name="nombre"
                id="nombre"
                placeholder="Tu Nombre"
                value="<?php echo $usuario->nombre;?>"
                >
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input
                type="text"
                class="formulario__input"
                name="apellido"
                id="apellido"
                placeholder="Tu Apellido"
                value="<?php echo $usuario->apellido;?>"
                >
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input
                type="email"
                class="formulario__input"
                name="email"
                id="email"
                placeholder="Tu Email"
                value="<?php echo $usuario->email;?>"
                >
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="password">Password</label>
            <input
                type="password"
                class="formulario__input"
                name="password"
                id="password"
                placeholder="Tu Password">
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir Password</label>
            <input
                type="password"
                class="formulario__input"
                name="password2"
                id="password2"
                placeholder="Repetir Password">
        </div>
        <input
            type="submit"
            class="formulario__submit"
            value="Crear Cuenta">
    </form>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>
    </div>
</main>