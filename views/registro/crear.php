<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo;?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">€0</p>
            <form method="POST" action="finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripción Gratis">
            </form>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>
            <p class="paquete__precio">€199</p>
            <div id="paypal-container-C4FN7AHVC5BWC"></div>
            
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>
            <p class="paquete__precio">€49</p>
        </div>
    </div>

</main>

<script src="https://www.paypal.com/sdk/js?client-id=BAA7jGyFkAu5lS92GC8MYWrtbVo1nSjZXDCFAvg4L2y4Jyt8Ho-JhQgFG6KBmqY2rWWntgNtHy6slcc1dw&components=hosted-buttons&disable-funding=venmo&currency=EUR"></script>

<script>
  paypal.HostedButtons({
    hostedButtonId: "C4FN7AHVC5BWC",
  }).render("#paypal-container-C4FN7AHVC5BWC")
</script>