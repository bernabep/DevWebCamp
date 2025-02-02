<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recuperar tu acceso a DevWebCamp</p>
    <?php 
include_once __DIR__ .'/../templates/alertas.php';
?>
    <form class="formulario" method="POST" action="/olvide">
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input
                type="email"
                class="formulario__input"
                name="email"
                id="email"
                placeholder="Tu Email">
        </div>
        <input
            type="submit"
            class="formulario__submit"
            value="Enviar Instrucciones">
    </form>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Obtener una</a>
    </div>
</main>