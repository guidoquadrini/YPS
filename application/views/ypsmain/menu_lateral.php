<!-- Inicia Menu Lateral -->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <span class="estilo_menu" id="showLeft"></span>
    <h3>Aplicativos</h3>
    <ul class="accordion">
        <?php
        //Carga Menu Lateral
        foreach ($menu_lateral as $item) {
            ?>
            <li id="<?= $row->idmenu; ?>" class="files"> 
                <a href=<?= $row->url; ?> title="<?= $row->descripcion; ?>">
                    <span><?= substr(($row->idmenu), 0, 1); ?></span><?= $row->nombre; ?>
                </a> 
                <ul class="sub-menu">
                    <?php
                    foreach ($datos['idmenu'] as $subitem) {
                        ?>
                        <li><a id="<?= $subitem->idmenu; ?>" href=<?= $subitem->url; ?> onclick="<?= $subitem->onclick; ?>"><em><?= $subitem->idmenu; ?></em>
                        <?= $subitem->nombre; ?><span></span></a></li>
    <?php }; ?>             
                </ul> </li> 

<?php }; ?>
    </ul>   
</nav>
<!-- Fin Menu Lateral -->
