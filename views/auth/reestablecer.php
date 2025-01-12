<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu nuevo password</p>
    <?php
    include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <?php if ($token_valido) { ?>
        <form class="formulario" method="POST">
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Nuevo Password</label>
                <input
                    type="password"
                    class="formulario__input"
                    name="password"
                    id="password"
                    placeholder="Tu Password">
            </div>
            <input
                type="submit"
                class="formulario__submit"
                value="Guardar">
        </form>
    <?php }; ?>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Obtener una</a>
    </div>
</main>