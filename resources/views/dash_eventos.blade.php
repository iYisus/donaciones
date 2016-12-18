<!-- Eventos -->
<div class="col-md-2">    
    <article class="white-panel">
        <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
            <?php echo $value['NOMBRE_EVENTO'] ?>
        </div>
        <img src="{{ asset('images/calendar.png') }}"
            style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
        <hr>
        <p><b><?php echo $value['FECHA_INICIO'] ?></b></p>
        <p>
            <?php echo $value['DESCRIPCION'] ?>
        </p>
    </article>
</div>