<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrativo</title>

    <link href="<?php echo base_url('public/css/style.default.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/morris.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/select2.css');?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('public/js/html5shiv.js');?>"></script>
    <script src="<?php echo base_url('public/js/respond.min.js');?>"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="<?php echo site_url('')?>" class="logo">
                    Beta Informática
                </a>
                <div class="pull-right">
                    <a href="#" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            
            <div class="header-right">
                <div class="pull-right">
                    <form class="form-inline pull-right" action='<?php echo site_url('configuracoes/setconfig')?>' method="POST">
                        <div class="form-group">
                        <?php
			$orgaosSelect = $this->Orgs->fetchAllForSelectInput();
			if ($orgaosSelect && count($orgaosSelect)):
                        echo form_dropdown("orgao_id", $orgaosSelect, $this->session->userdata('orgao')->org_id, 'id="orgao_id"  class="form-control" style="height:37px"');
                        endif;
			?>           
                        </div>
                        <input type='hidden' name="redirectTo" value="<?php echo current_url(); ?>">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-cog"> Alterar Órgão</i></button>
                    </form>
                    <!-- <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li><a href="#"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sair</a></li>
                        </ul>
                    </div> -->
                </div>
            </div> 
        </div>
    </header>
        
    <section>
        <div class="mainwrapper">
            <div class="leftpanel">
                <!-- <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="profile.html">
                        <img class="img-circle" src="images/photos/profile.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Adminstrador</h4>
                        <small class="text-muted"> </small>
                    </div>
                </div> --><!-- media -->
                
                <h5 class="leftpanel-title">Menu</h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?php menu_active('home', $page); ?>"><a href="<?php echo site_url('');?>"><i class="fa fa-home"></i> <span>Início</span></a></li>
                    <li class="<?php menu_active('history', $page); ?>"><a href="<?php echo site_url('files/history')?>"><i class="fa fa-file-excel-o"></i> <span>Arquivos de Histórico</span></a>
                    <li class="<?php menu_active('margin', $page); ?>"><a href="<?php echo site_url('files/margin')?>"><i class="fa fa-file-excel-o"></i> <span>Arquivos de Margem</span></a>
                    <li class="<?php menu_active('moviment', $page); ?>"><a href="<?php echo site_url('files/moviment')?>"><i class="fa fa-file-excel-o"></i> <span>Arquivos de Movimento</span></a>
                    <li class="<?php menu_active('return', $page); ?>"><a href="<?php echo site_url('files/returns')?>"><i class="fa fa-file-excel-o"></i> <span>Arquivos de Retorno</span></a></li>
                    <li class="<?php menu_active('configuracoes', $page); ?>"><a href="<?php echo site_url('configuracoes')?>"><i class="fa fa-cog"></i> <span>Configurações</span></a></li>
                </ul>
                
            </div><!-- leftpanel -->

            <div class="mainpanel">
                <div class="pageheader">
                    <div class="media">
                        <div class="pageicon pull-left">
                            <i class="fa <?php echo (isset($page_icon)) ? $page_icon : ''; ?>"></i>
                        </div>
                        <div class="media-body">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo site_url('');?>"><i class="glyphicon glyphicon-home"></i></a></li>
                                <li><?php echo (isset($page_title)) ? $page_title : ''; ?></li>
                            </ul>
                            <h4><?php echo (isset($page_title)) ? $page_title : ''; ?></h4>
                        </div>
                    </div><!-- media -->
                </div><!-- pageheader -->

                <div class="contentpanel">

