<?php
    function configurar_menu($pagina = ''){
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

        //Opción sucursales
        $menu_item['is_active'] = ($pagina == "sucursales") ? TRUE : FALSE;
        $menu_item['href'] = './sucursales.php';
        $menu_item['icon'] = 'fa fa-building';
        $menu_item['text'] = 'Sucursales';
        $menu_item['submenu'] = array();
        $menu['sucursales'] = $menu_item;
        
        //Opción Peliculas
        $menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
        $menu_item['href'] = './usuarios.php';
        $menu_item['icon'] = 'fa fa-video-camera';
        $menu_item['text'] = 'Peliculas';
        $menu_item['submenu'] = array();
        $menu['peliculas'] = $menu_item;
        
        //Generos
        $menu_item['is_active'] = ($pagina == "generos") ? TRUE : FALSE;
        $menu_item['icon'] = 'fa fa-book';
        $menu_item['href'] = '#';
        $menu_item['text'] = 'Géneros';
        $menu_item['submenu'] = array();
            //Submenu
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = ($pagina == "generos") ? TRUE : FALSE;
            $sub_menu_item['href'] = './.php';
            $sub_menu_item['icon'] = '';
            $sub_menu_item['text'] = 'Acción';
            $menu_item['submenu']['accion'] = $sub_menu_item;
            //
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = ($pagina == "generos") ? TRUE : FALSE;
            $sub_menu_item['href'] = './.php';
            $sub_menu_item['icon'] = '';
            $sub_menu_item['text'] = 'Animación';
            $menu_item['submenu']['animacion'] = $sub_menu_item;
        $menu['generos'] = $menu_item;

        return $menu;
    }//end 

    function crear_menu_panel($pagina = '') {
        $menu = configurar_menu($pagina);
        $html= '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
            foreach ($menu as $item) {
                if($item['href'] != '#'){
                    $html.='
                    <li class="nav-item">
                        <a href="'.$item['href'].'"  class="nav-link '.($item["is_active"] ? 'active' : '').'">
                        <i class="'.$item['icon'].' nav-icon"></i>
                        <p>'.$item['text'].'</p>
                        </a>
                    </li>';
                }//end if href != # 
                else{
                    if(sizeof($item['submenu']) > 0){
                        $html.='
                        <li class="nav-item '.($item["is_active"] ? 'menu-is-opening menu-open' : '').'">
                            <a href="'.$item['href'].'" class="nav-link '.($item["is_active"] ? 'active' : '').'">
                                <i class="nav-icon '.$item['icon'].'"></i>
                                <p>
                                    '.$item['text'].'
                                    <i class="right fa fa-sort-desc"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">';
                            foreach ($item['submenu'] as $item_sub_menu) {
                                // $html.='<li><a href="'.$item_sub_menu["href"].'">'.$item_sub_menu["text"].'</a></li>';
                                $html.= '
                                    <li class="nav-item">
                                        <a href="'.$item_sub_menu["href"].'"  class="nav-link '.($item_sub_menu["is_active"] ? 'active' : '').'">
                                            <i class="'.$item_sub_menu['icon'].' nav-icon"></i>
                                            <p>'.$item_sub_menu["text"].'</p>
                                        </a>
                                    </li>
                                ';
                            }//end foreach
                            $html.='</ul>
                        </li>
                        ';
                    }//end else sizeof
                }//end else href != #
            }//end foreach
        $html.= '</ul>';
        return $html;
    }//end 