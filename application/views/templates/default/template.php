<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="E-Business - Yerpa Pro Salud">
        <meta name="author" content="Q-Informatica">
        <link rel="shortcut icon" href="docs-assets/ico/favicon.png">
        <title>Yerpa Pro Salud</title>
        <?php echo $_css; ?>
    </head>
    <body>  
        <?php echo $top_menu; ?>
    <!-- Inicia Menu Lateral -->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <span class="estilo_menu" id="showLeft"></span>
            <h3>Aplicativos</h3>

            <?php
            //Carga Menu Lateral
            $select = "SELECT * FROM menu WHERE nivel = 0;";
            //$resultado = cmdDB($select);
            //$datos = (array) ($resultado['Datos']);
            echo '<ul class="accordion">';
            //foreach ($datos as $row) {
                ?>


                <li id="<?php //echo $row->idmenu; ?>" class="files"> 
                    <a href=<?php //echo $row->url; ?> title="<?php //echo $row->descripcion; ?>"><span><?php //echo substr(($row->idmenu), 0, 1); ?></span><?php //echo $row->nombre; ?></a> 
                    <ul class="sub-menu">
                        <?php
                        //$select2 = "SELECT * FROM menu WHERE nivel = " . $row->idmenu . ";";
                        //$resultado2 = cmdDB($select2);
                        //$datos2 = (array) ($resultado2['Datos']);
                        //foreach ($datos2 as $row2) {
                            ?>
                            <li><a id="<?php //echo $row2->idmenu; ?>" href=<?php //echo $row2->url; ?> onclick=" <?php //echo $row2->onclick; ?>"><em><?php //echo $row2->idmenu; ?></em>
                                    <?php //echo $row2->nombre; ?><span></span></a></li>
                        <?php //}; ?>             
                    </ul> </li> 

            <?php //}; ?>
        </ul>   
    </nav>
    <!-- Fin Menu Lateral -->

    <div class="container">
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
        <div id="CuerpoPagina" >
            <div class="page-header">
<!--                <h4>Tablero de Control </h4>
                <em><small>Aqui podra visualizar todos los valores significativos del sistema.</small></em>-->
            </div>
     
                    <?php foreach ($_content as $_view): ?>
                        <?php include $_view; ?>
                    <?php endforeach; ?>   
             
            <div class="row"></div>

            <!-- Optional: clear the XS cols if their content doesn't match in height -->
            <div class="clearfix visible-xs"></div>
             
            
        </div>
    </div>
    <hr>
        
    <!--Edit Modal-->		
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="msgBox" tabindex="-1" role="dialog" aria-labelledby="msgBoxLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="msgBoxLabel">Modal title</h4>
                </div>
                <div class="modal-body" id="msgBoxContent"></div>
                <div class="modal-footer">
                    <button type="button" id="msgBoxCerrar" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" Id="msgBoxAceptar" style="visibility: hidden;" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    
        <?php echo $footer; ?>
    
  <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php echo $_js; ?>
</body>
</html>






      


               


      
