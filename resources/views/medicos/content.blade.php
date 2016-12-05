<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach ($data['especialidades'] as $key): ?>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $key['ID'] ?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $key['ESPECIALIDAD'] ?>
          </a>
        </h4>
      </div>
      <div id="<?php echo $key['ID'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          @include('medicos.table')
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>