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

  <a href="<?php echo site_url('configuracoes/cadastrarOrgao')?>" class="pull-right btn btn-primary">Cadastrar Orgão</a>
  
  <div class="row row-stat">
      <div class="col-md-12">
        <!-- <h5 class="lg-title mb5">Listagem</h5>
        <p class="mb20">De tabela de serviços</p> -->
        <div class="table-responsive">
          <table class="table table-striped mb30">
            <thead>
              <tr>
              	<th class="text-left">NOME</th>
                <th style="width:130px">CÓDIGO ORGÃO</th>
                <th style="width:50px">ESTABELECIMENTO</th>
                <th style="width:150px">DATA DE CADASTRO</th>
                <th>FILEPATH</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if ($orgaos && count($orgaos)):
                foreach ($orgaos as $row):
            ?>
              <tr>
              	<td class="text-left"><?php echo $row->org_name?></td>
                <td><?php echo $row->org_code?></td>
                <td><?php echo $row->org_establishment_code?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row->org_date))?></td>
                <td><?php echo $row->org_basepath?></td>
                <td class="text-right">
                  <a class="btn btn-xs btn-danger" href="<?php echo site_url('configuracoes/delete/'.$row->org_id)?>" onClick='return confirmDelete()'>Excluir</a>
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
          function confirmDelete() {
            var confirmMessage = confirm("Deseja excluir este Órgão definitivamente? Todos os arquivos deste órgao serão excluídos permanentemente.");
            if (!confirmMessage) {
              return false;
            } else {
              return true;
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
