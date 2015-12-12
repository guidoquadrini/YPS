<!DOCTYPE html>
<html lang="<?php echo $_AbreviacionIdioma; ?>">
    <head>
        <link rel="shortcut icon" 
              href="assets\images\templates\default\favicon.ico">
    <?php foreach ($_metaData as $_HeaderLine): ?>        
            <?php  echo $_HeaderLine; ?>
    <?php endforeach; ?> 
    <title><?php echo $_tituloAplicacion; ?></title>
    <?php echo $_css; ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
      <div class="wrapper">
    <?php echo $_Componentes['Header']; ?>
    <?php echo $_Componentes['LeftSide']; ?>

    <div class="AreaDeNotificaciones">
        <?php foreach ($_warning as $_msg): ?>
            <div class="alert alert-warning"><?php echo $_msg; ?></div>
        <?php endforeach; ?>
        <?php foreach ($_success as $_msg): ?>
            <div class="alert alert-success"><?php echo $_msg; ?></div>
        <?php endforeach; ?>
        <?php foreach ($_info as $_msg): ?>
            <div class="alert alert-info"><?php echo $_msg; ?></div>
        <?php endforeach; ?>
        <?php foreach ($_error as $_msg): ?>
            <div class="alert alert-danger"><?php echo $_msg; ?></div>
        <?php endforeach; ?>
        <div id ="mensaje"></div>        
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        
         <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           
            <?=$_tituloContenido;?>
            <small><?=$_descContenido;?></small>
          </h1>
          <ol class="breadcrumb">
              <?=$_breadCrumb;?>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content ">

          <?php foreach ($_content as $_view): ?>
            
                <?php include $_view; ?>
            </section><!-- /.content -->
            <?php endforeach; ?> 

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
        
        
    <?php echo $_Componentes['Footer']; ?>
    <?php echo $_Componentes['RightSide']; ?>
    
</div><!-- ./wrapper -->
    <?php echo $_js; ?>
</body>
</html>













