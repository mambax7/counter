<?php
$modversion['name'] = _MI_COUNTER_NAME;
$modversion['version'] = "1.0.0";
$modversion['description'] = _MI_COUNTER_DESC;
$modversion['credits'] = "(Me)";
$modversion['author'] = "(Xend) Jan Inge Pettersen (jan@xendtech.com)";
$modversion['help'] = "Sem ajuda para isto";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = "0";
$modversion['image'] = "counter.png";
$modversion['dirname'] = "counter";


// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";


// Menu
$modversion['hasMain'] = 0;

// block
$modversion['blocks'][1]['file'] = "counterblock.php";
$modversion['blocks'][1]['name'] = _MI_COUNTER;
$modversion['blocks'][1]['description'] = _MI_COUNTER_DESC;
$modversion['blocks'][1]['show_func'] = "disp_block_counter";
?>
