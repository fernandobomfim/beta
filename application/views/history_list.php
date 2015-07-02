<?php require('header.php');?>
  
  <?php 
    $mensagem = $this->message->get(true);
    if (!empty($mensagem)):
  ?>

  <div class="row">
    <div class="col-md-12">
      <?php echo $mensagem; ?>
    </div>
  </div>
  <?php 
    endif;
  ?>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-12">
        <h4 class="pull-left">FILTROS</h4>
        <!-- <form class="form-inline pull-right" action='<?php echo site_url('files/createHistoryFile')?>' method="POST">
          <div class="form-group">
            <label for="evento">EVENTO: </label>
            <?php
              echo form_dropdown("evento", $eventos, '', 'id="evento" class="form-control" style="height:40px"');
            ?>
          </div>
          <button type="submit" class="btn btn-primary">Gerar Arquivo de Histórico</button>
        </form> -->
        <button class="pull-right btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Selecionar Filtros de Eventos</button>
      </div>
    </div>
  </div>

  <div class="row row-stat">
      <div class="col-md-12">
        <!-- <h5 class="lg-title mb5">Listagem</h5>
        <p class="mb20">De tabela de serviços</p> -->
        <div class="table-responsive">
          <table class="table table-striped mb30">
            <thead>
              <tr>
                <th class="text-center" style="width:30px">#</th>
                <th style="width:200px">TIPO</th>
                <th>DATA DE GERAÇÃO</th>
                <th>ÓRGÃO</th>
                <th>EVENTO</th>
                <th class="text-center" style="width:100px">DOWNLOAD</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if ($files && count($files)):
                foreach ($files as $row):
            ?>
              <tr>
                <td class="text-center"><?php echo $row->file_id?></td>
                <td><?php echo $row->type_name?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row->file_upload_date))?></td>
                <td><?php echo $row->file_org_name;?></td>
                <td><?php echo $row->file_filter_serialized;?></td>
                <td class="text-center">
                  <a href="<?php echo site_url('files/download/'.$row->file_id)?>"><i class="fa fa-download"></i></a>
                </th>
              </tr>
            <?php
                endforeach;
              else:
            ?>
              <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
              </tr>
            <?php
              endif;
            ?>
            </tbody>
          </table>
        </div><!-- table-responsive -->
      </div><!-- col-md-6 -->                            
      <!-- <div class="btn-group pull-right">
          <button type="button" class="btn btn-primary">Anterior</button>
          <button type="button" class="btn btn-primary">Próximo</button>
      </div> -->
  </div><!-- row -->

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title">Filtro de Eventos</h4>
            </div>
              <form class="form" action='<?php echo site_url('files/createHistoryFile')?>' method="POST">
                <div class="modal-body" style="height:250px; overflow:auto;">
                  <div class="panel">
                  <?php
                    foreach ($eventos as $key => $value) {
                      echo '<div class="checkbox block"><label><input type="checkbox" name="eventos[]" value="'.$key.'"> '.$value.'</label></div>';
                    }
                  ?>
                    <!-- <button type="submit" class="btn btn-danger">Gerar Margem</button> -->
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="submit" class="btn btn-success pull-right">Gerar Arquivo de Histórico</button>
                </div>
              </form>
        </div>
      </div>
  </div>
<?php require('footer.php');?>
