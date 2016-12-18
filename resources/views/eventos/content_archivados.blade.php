<div class="row titleDivEventos shadowBox archivados"> 
	<div class="col-md-12"> Archivados  </div>
</div>
<div class="row content" style='height: 354px;overflow: auto;'>
<?php if (isset($enviar['eventos'][2])): ?>
	<?php foreach ($enviar['eventos'][2] as $key) { ?>
		<div class="col-md-10 col-md-offset-1 shadowBox margintopBox desarchivar" evento='<?php echo $key['ID'] ?>'>
			<div class="col-md-6"> <?php echo $key['FECHA_INICIO'] ?> </div>
			<div class="col-md-6"> <?php echo $key['NOMBRE_EVENTO'] ?> </div>
		</div>
	<?php } ?>
<?php else: ?>
	<div class="col-md-10 col-md-offset-1 shadowBox margintopBox">
		<center>NO HAY EVENTOS ARCHIVADOS</center>
	</div>
<?php endif; ?>
</div>
<script type="text/javascript">
	eventosJS.desarchivar();
</script>