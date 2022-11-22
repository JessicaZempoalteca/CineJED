<?php
function configurar_menu($pagina = '')
{
    $menu = array();
    $menu_item = array();
    $sub_menu_item = array();

    //Opción Dashboard
    $menu_item['is_active'] = ($pagina == "dashboard") ? TRUE : FALSE;
    $menu_item['href'] = './dashboard.php';
    $menu_item['icon'] = 'fa fa-dashboard';
    $menu_item['text'] = 'Dashboard';
    $menu_item['submenu'] = array();
    $menu['inicio'] = $menu_item;

    //Opción Usuario
    $menu_item['is_active'] = ($pagina == "usuarios") ? TRUE : FALSE;
    $menu_item['href'] = './usuarios.php';
    $menu_item['icon'] = 'fa fa-user';
    $menu_item['text'] = 'Usuarios';
    $menu_item['submenu'] = array();
    $menu['usuario'] = $menu_item;

    //Opción boletos
    $menu_item['is_active'] = ($pagina == "boletos") ? TRUE : FALSE;
    $menu_item['href'] = './boletos.php';
    $menu_item['icon'] = 'fa fa-ticket';
    $menu_item['text'] = 'Boletos';
    $menu_item['submenu'] = array();
    $menu['boletos'] = $menu_item;

    //Opción peliculas
    $menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
    $menu_item['icon'] = 'fa fa-film';
    $menu_item['href'] = '#';
    $menu_item['text'] = 'Películas';
    $menu_item['submenu'] = array();
    //Submenu
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
    $sub_menu_item['href'] = './familiares.php';
    $sub_menu_item['icon'] = 'fa fa-child';
    $sub_menu_item['text'] = 'Familiares';
    $menu_item['submenu']['familiares'] = $sub_menu_item;
    //
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
    $sub_menu_item['href'] = './comedia.php';
    $sub_menu_item['icon'] = 'fa fa-smile-o';
    $sub_menu_item['text'] = 'Comedia';
    $menu_item['submenu']['comedia'] = $sub_menu_item;
    //
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
    $sub_menu_item['href'] = './accion.php';
    $sub_menu_item['icon'] = 'fa fa-car';
    $sub_menu_item['text'] = 'Acción';
    $menu_item['submenu']['accion'] = $sub_menu_item;
    $menu['peliculas'] = $menu_item;

    //Opción sucursales
    $menu_item['is_active'] = ($pagina == "sucursales") ? TRUE : FALSE;
    $menu_item['href'] = './sucursales.php';
    $menu_item['icon'] = 'fa fa-building';
    $menu_item['text'] = 'Sucursales';
    $menu_item['submenu'] = array();
    $menu['sucursales'] = $menu_item;

    //Opción salas
    $menu_item['is_active'] = ($pagina == "salas") ? TRUE : FALSE;
    $menu_item['href'] = './salas.php';
    $menu_item['icon'] = 'fa fa-users';
    $menu_item['text'] = 'Salas de cine';
    $menu_item['submenu'] = array();
    $menu['salas'] = $menu_item;

    //Opción contacto
    $menu_item['is_active'] = ($pagina == "contacto") ? TRUE : FALSE;
    $menu_item['href'] = './contacto.php';
    $menu_item['icon'] = 'fa fa-comments-o';
    $menu_item['text'] = 'Comentarios';
    $menu_item['submenu'] = array();
    $menu['contacto'] = $menu_item;

    //Opción promociones
    $menu_item['is_active'] = ($pagina == "promociones") ? TRUE : FALSE;
    $menu_item['href'] = './promociones.php';
    $menu_item['icon'] = 'fa fa-percent';
    $menu_item['text'] = 'Promociones';
    $menu_item['submenu'] = array();
    $menu['promociones'] = $menu_item;

    return $menu;
} //end 

function crear_menu_panel($pagina = '')
{
    $menu = configurar_menu($pagina);
    $html = '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
    foreach ($menu as $item) {
        if ($item['href'] != '#') {
            $html .= '
                    <li class="nav-item">
                        <a href="' . $item['href'] . '"  class="nav-link ' . ($item["is_active"] ? 'active' : '') . '">
                        <i class="' . $item['icon'] . ' nav-icon"></i>
                        <p>' . $item['text'] . '</p>
                        </a>
                    </li>';
        } //end if href != # 
        else {
            if (sizeof($item['submenu']) > 0) {
                $html .= '
                        <li class="nav-item ' . ($item["is_active"] ? 'menu-is-opening menu-open' : '') . '">
                            <a href="' . $item['href'] . '" class="nav-link ' . ($item["is_active"] ? 'active' : '') . '">
                                <i class="nav-icon ' . $item['icon'] . '"></i>
                                <p>
                                    ' . $item['text'] . '
                                    <i class="right fa fa-sort-desc"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">';
                foreach ($item['submenu'] as $item_sub_menu) {
                    // $html.='<li><a href="'.$item_sub_menu["href"].'">'.$item_sub_menu["text"].'</a></li>';
                    $html .= '
                                    <li class="nav-item">
                                        <a href="' . $item_sub_menu["href"] . '"  class="nav-link ' . ($item_sub_menu["is_active"] ? 'active' : '') . '">
                                            <i class="' . $item_sub_menu['icon'] . ' nav-icon"></i>
                                            <p>' . $item_sub_menu["text"] . '</p>
                                        </a>
                                    </li>
                                ';
                } //end foreach
                $html .= '</ul>
                        </li>
                        ';
            } //end else sizeof
        } //end else href != #
    } //end foreach
    $html .= '</ul>';
    return $html;
}//end 