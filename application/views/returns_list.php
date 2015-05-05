<?php require('header.php');?>
  
  <div class="row">
    <div class="col-md-12">
      <a class='pull-right btn btn-primary'>Gerar <?php echo $page_title;?></a>
    </div>
  </div>
  <br>

  <div class="row row-stat">
      <div class="col-md-12">
        <!-- <h5 class="lg-title mb5">Listagem</h5>
        <p class="mb20">De tabela de serviços</p> -->
        <div class="table-responsive">
          <table class="table table-striped mb30">
          <?php if ($returns && count($returns)): ?>
            <thead>
              <tr>
                <th>EQUIPAMENTO</th>
                <th>FAIXA DE MEDIÇÃO</th>
                <th>MELHOR CAPACIDADE DE  MEDIÇÃO</th>
                <th>METODOLOGIA</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($returns as $row):
            ?>
              <tr>
                <td>1</td>
                <td>Titulo do Artigo/Publicação</td>
                <td>Descrição bem curta para não ficar zoado...</td>
                <td>11/11/1991</td>
                <td class="table-action">
                  <a href="#" data-toggle="tooltip" title="" class="tooltips" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                  <a href="#" data-toggle="tooltip" title="" class="delete-row tooltips" data-original-title="Excluir"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
            <?php
                endforeach;
            ?>
            </tbody>
          <?php else: ?>
          <tr>
            <td colspan="6">Nenhum registro encontrado.</td>
          </tr>
          <?php endif; ?>
          </table>
        </div><!-- table-responsive -->
      </div><!-- col-md-6 -->                            
      <!-- <div class="btn-group pull-right">
          <button type="button" class="btn btn-primary">Anterior</button>
          <button type="button" class="btn btn-primary">Próximo</button>
      </div> -->
  </div><!-- row -->
<?php require('footer.php');?>