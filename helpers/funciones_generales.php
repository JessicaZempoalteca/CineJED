<?php
    function path_image($folder = '', $img = ''){
        $path = ($folder != "") ? '../img' . $img : './Portal/img/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/noImage.jpg' : './Portal/img/noImage.jpg'));
    }
    //Constante para tomar la carpeta de recursos del portal
    $root_path_portal = './portal/resources/';
    $root_specific_portal = '../resources/';

    //Constante para tomar la carpeta de usuario
    $root_specific_user = './resource/';


    function path_image($folder = '', $img = ''){
        //$identificador = (condition) ? 'has esto - action a' : 'si no action b' ;
        $path = ($folder != "") ? '../img/'. $img : './portal/img/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/no-image.png' : './portal/img/no-image.png'));
    }//end path_image
