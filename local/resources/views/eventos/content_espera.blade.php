<div class="row titleDivEventos shadowBox espera"> 
	<div class="col-md-12"> En espera  </div>
</div>
<div class="row content" style='height: 354px;overflow: auto;'>
<?php if (isset($enviar['eventos'][1])): ?>
	<?php foreach ($enviar['eventos'][1] as $key) { ?>
		<div class="col-md-10 col-md-offset-1 viewEvento shadowBox margintopBox" evento='<?php echo $key->ID ?>'>
			<div class="col-md-6"> <?php echo $key->FECHA_INICIO ?> </div>
			<div class="col-md-6"> <?php echo $key->NOMBRE_EVENTO ?> </div>
		</div>
	<?php } ?>
<?php else: ?>
	<div class="col-md-10 col-md-offset-1 shadowBox margintopBox">
		<center>NO HAY EVENTOS EN ESPERA</center>
	</div>
<?php endif; ?>
</div>
<script type="text/javascript">
	eventosJS.desarchivar()
	eventosJS.viewEvento()
</script>