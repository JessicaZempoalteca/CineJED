<?php
    function configurar_menu($folder = '' , $pagina = '') {
        $menu = array();
        $menu_item  = array();
        $sub_menu_item = array();
    
        //Opcion Inicio
        $menu_item['is_active'] = ($pagina == "index") ? TRUE : FALSE;
        $menu_item['href'] = ($folder != '') ? '../../index.php' : './index.php' ;
        $menu_item['text'] = 'Inicio';
        $menu_item['submenu'] = array();
        $menu['inicio'] = $menu_item;
    
        //Opcion Generos
        $menu_item['is_active'] = ($pagina == "peliculas") ? TRUE : FALSE;
        $menu_item['href'] = '#';
        $menu_item['text'] = 'Peliculas';
        $menu_item['submenu'] = array();
            //Submenu
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = FALSE;
            $sub_menu_item['href'] = ($folder != '') ? './terror.php' : './portal/pages/terror.php';
            $sub_menu_item['text'] = 'Terror/Suspenso';
            $menu_item['submenu']['terror'] = $sub_menu_item;
            //
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = FALSE;
            $sub_menu_item['href'] = ($folder != '') ? './familiares.php' : './portal/pages/familiares.php';
            $sub_menu_item['text'] = 'Familiares';
            $menu_item['submenu']['familiares'] = $sub_menu_item;
            //
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = FALSE;
            $sub_menu_item['href'] = ($folder != '') ? './comedia.php' : './portal/pages/comedia.php';
            $sub_menu_item['text'] = 'Comedia';
            $menu_item['submenu']['comedia'] = $sub_menu_item;
            //
            $sub_menu_item = array();
            $sub_menu_item['is_active'] = FALSE;
            $sub_menu_item['href'] = ($folder != '') ? './accion.php' : './portal/pages/accion.php';
            $sub_menu_item['text'] = 'Acción';
            $menu_item['submenu']['accion'] = $sub_menu_item;
        $menu['categorias'] = $menu_item;

        $menu_item['is_active'] = ($pagina == "estrenos") ? TRUE : FALSE;
        $menu_item['href'] = ($folder != '') ? '../../estrenos.php' : './portal/pages/estrenos.php' ;
        $menu_item['text'] = 'Estrenos';
        $menu_item['submenu'] = array();
        $menu['estrenos'] = $menu_item;

        $menu_item['is_active'] = ($pagina == "preventa") ? TRUE : FALSE;
        $menu_item['href'] = ($folder != '') ? '../../preventa.php' : './portal/pages/preventa.php' ;
        $menu_item['text'] = 'Preventa';
        $menu_item['submenu'] = array();
        $menu['preventa'] = $menu_item;

        $menu_item['is_active'] = ($pagina == "login") ? TRUE : FALSE;
        $menu_item['href'] = ($folder != '') ? '../../login.php' : './portal/pages/login.php' ;
        $menu_item['text'] = 'Ingresar';
        $menu_item['submenu'] = array();
        $menu['login'] = $menu_item;
        return $menu;
      }


function crear_menu($folder = '', $pagina = ''){
        $menu = configurar_menu($folder, $pagina);
        $html = '';
        $html .= '<ul>';
        foreach($menu as $item){
            if($item['href'] != '#'){
                $html.='<li class="'.($item["is_active"] ? 'active' : '').'"><a href="'.$item["href"].'">'.$item["text"].'</a></li>'; 
            }
            else{
                $html.='<li class="'.($item["is_active"] ? 'active' : '').'"><a href="#">'.$item["text"].' <i class="bi bi-caret-down"></i></a>
                        <ul class="dropdown">';
                        if(sizeof($item['submenu']) > 0){
                            foreach ($item['submenu'] as $item_sub_menu) {
                              $html.='<li><a href="'.$item_sub_menu["href"].'">'.$item_sub_menu["text"].'</a></li>';
                            }
                          }
              
                        $html.='</ul></li>';
                      }
                    }
                  $html.='</ul>';
                  return $html;
                }
