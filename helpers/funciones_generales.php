<?php
    //Constante para tomar la carpeta de recursos del portal
    $root_path_portal = './portal/resources/';
    $root_specific_portal = '../resources/';

    //Constante para tomar la carpeta de usuario
    $root_specific_user = './resource/';

    function path_image($folder = '', $imgName = ''){
        $path = ($folder != "") ? '../img' . $imgName : './portal/img' . $imgName;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/noImage.jpg' : './portal/img/noImage.jpg'));
    }
?>