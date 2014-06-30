<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
        
        <title>Static Top Navbar Example for Bootstrap</title>
        
        <!-- Bootstrap core CSS -->
        <?=$_css?>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">Project name</a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../navbar/">Default</a></li>
                        <li class="active"><a href="./">Static top</a></li>
                        <li><a href="../navbar-fixed-top/">Fixed top</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php foreach($_warning as $_msg): ?>
                        <div class="alert alert-warning"><?=$_msg?></div>
                    <?php endforeach;?>

                    <?php foreach($_success as $_msg): ?>
                        <div class="alert alert-success"><?=$_msg?></div>
                    <?php endforeach;?>

                    <?php foreach($_error as $_msg): ?>
                        <div class="alert alert-danger"><?=$_msg?></div>
                    <?php endforeach;?>

                    <?php foreach($_info as $_msg): ?>
                        <div class="alert alert-info"><?=$_msg?></div>
                    <?php endforeach;?>

                    <?php foreach($_content as $_view): ?>
                      <?php include $_view;?>
                    <?php endforeach; ?>                
                </div>
            
                <div class="col-md-4">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Messages</a></li>
                    </ul>
                </div>
            </div>
        </div> <!-- /container -->
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?=$_js?>
    </body>
</html>

