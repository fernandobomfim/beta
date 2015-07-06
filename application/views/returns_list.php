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
        <h4 class="pull-left">GERAR</h4>
        <a class="pull-right btn btn-primary" href="<?php echo site_url('files/createReturnsFile');?>" onClick='return confirmMovimentProcess()'>Gerar Arquivo de Retorno</a>
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
                <th>DATA DE GERAÇÃO</th>
                <th class="text-right">DOWNLOAD</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if ($files && count($files)):
                foreach ($files as $row):
            ?>
              <tr>
                <td><?php echo $row->file_id?></td>
                <td><?php echo $row->type_name?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row->file_upload_date))?></td>
                <td class="text-right">
                  <a class="btn btn-info btn-xs" href="<?php echo site_url('files/download/'.$row->file_id)?>"><i class="fa fa-download"></i> Baixar</a>
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

          <script type="text/javascript">
          function confirmMovimentProcess() {
            var confirmMessage = confirm("Deseja gerar o Arquivo de Retorno? Tenha a certeza de já ter processado o MOVGER, caso contrário, todos os lançamentos do CODFIX serão considerados como \"regeitados\".");
            if (!confirmMessage) {
              return false;
            } else {
              message = 'Aguarde! Procesando Arquivo de Retorno...';
              waitingDialog.show(message, {dialogSize: 'md', progressType: 'info'});

            }
          }
          </script>

        </div><!-- table-responsive -->
      </div><!-- col-md-6 -->                            
      <!-- <div class="btn-group pull-right">
          <button type="button" class="btn btn-primary">Anterior</button>
          <button type="button" class="btn btn-primary">Próximo</button>
      </div> -->
  </div><!-- row -->
<?php require('footer.php');?>