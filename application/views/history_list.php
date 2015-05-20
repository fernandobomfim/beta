<?php require('header.php');?>
  
  <?php $this->message->get();?>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-12">
        <h4 class="pull-left">FILTROS</h4>
        <form class="form-inline pull-right" action='<?php echo site_url('files/createHistoryFile')?>' method="POST">
          <div class="form-group">
            <label for="evento">EVENTO: </label>
            <?php
              echo form_dropdown("evento", $eventos, '', 'id="evento" class="form-control" style="height:40px"');
            ?>
          </div>
          <button type="submit" class="btn btn-primary">Gerar Arquivo de Histórico</button>
        </form>
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
<?php require('footer.php');?>
