<?php require('header.php');?>
  
  <?php $this->message->get();?>
  
  <div class="row row-stat">
      <?php if(validation_errors()): ?>
      <div class="col-md-12 alert alert-danger">
      <?php echo validation_errors(); ?>
      </div>
      <?php endif; ?>
      <div class="col-md-6">
        <form action="<?php echo site_url('configuracoes/cadastrarOrgao');?>" method="POST">
          <div class="form-group">
            <label for="nome"><strong>Nome do Órgão:</strong></label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Ex: Secretaria da Educação" value="<?php echo set_value('nome');?>">
          </div>
          <div class="form-group">
            <label for="codigoOrgao"><strong>Código do Órgão:</strong></label>
            <input type="text" name="codigoOrgao" maxlength="3" class="form-control" id="codigoOrgao" placeholder="Ex: 001" value="<?php echo set_value('codigoOrgao');?>">
          </div>
          <div class="form-group">
            <label for="codigoEstabelecimento"><strong>Código do Estabelecimento:</strong></label>
            <input type="text" name="codigoEstabelecimento" maxlength="3" class="form-control" id="codigoEstabelecimento" placeholder="Ex: 002" value="<?php echo set_value('codigoEstabelecimento');?>">
          </div>
          <div class="form-group">
            <label for="basePath"><strong>BasePath dos Arquivos DBF:</strong></label>
            <input type="text" name="basepath" class="form-control" id="codigoEstabelecimento" placeholder="Ex: \FOL20\MORENO\" value="<?php echo set_value('basepath');?>"><small>Dica: A máquina virtual mapeia a unidade raiz do HD do Servidor dentro de uma pasta chamada DBF. Portanto, é necessário cadastrar o BasePath de acordo com o caminho real no servidor, ignorando a letra da Unidade do HD.<br>Obs: o BasePath deve terminar com a barra "\" no final.</small>
          </div>
          <input type="submit" class="btn btn-success" value="Cadastrar">
          <a href="<?php echo site_url('configuracoes')?>" class="btn btn-danger">Cancelar</a>
        </form>
      </div><!-- col-md-12 -->   
      
  </div><!-- row -->

<?php require('footer.php');?>