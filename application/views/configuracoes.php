<?php require('header.php');?>
  
  <?php $this->message->get();?>

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
                <!-- <td class="text-right">
                  <a href="<?php echo site_url('files/download/'.$row->org_id)?>"><i class="fa fa-download"></i></a>
                </th> -->
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
