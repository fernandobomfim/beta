<?php require('header.php');?>
  
  <div class="panel panel-default">
    <?php $this->message->get();?>
    <div class="panel-body">
      <div class="col-md-12">
        <h4 class="pull-left">UPLOAD</h4>
        <form class="form-inline pull-right" action='<?php echo site_url('files/uploadFile')?>' method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <?php
              echo form_upload("movimento", '', 'id="movimento" class="form-control" style="height:40px"');
            ?>
          </div>
          <button type="submit" class="btn btn-primary">Upload de Arquivo de Movimento</button>
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
                <th>#</th>
                <th>TIPO</th>
                <th>STATUS</th>
                <th>DATA DE GERAÇÃO</th>
                <th>ÓRGÃO</th>
                <th class="text-right">PROCESSAR</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if ($files && count($files)):
                foreach ($files as $row):
                  $status = ($row->file_status == 1) ? "<label class='label label-success'>Processado</label>" : "<label class='label label-warning'>Não processado</label>"
            ?>
              <tr>
                <td><?php echo $row->file_id?></td>
                <td><?php echo $row->type_name?></td>
                <td><?php echo $status?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row->file_upload_date));?></td>
                <td><?php echo str_pad($row->file_org_id, 3, '0', STR_PAD_LEFT)." - ".$row->file_org_name;?></td>
                <td class="text-right">
                  <?php if ($row->file_status == 0): ?>
                  <a href="<?php echo site_url('files/movimentProcess/'.$row->file_id)?>"><i class="fa fa-cog"></i></a>
                  <?php endif; ?>
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