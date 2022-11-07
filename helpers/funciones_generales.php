<?php
    function path_image($folder = '', $img = ''){
        $path = ($folder != "") ? '../img/' . $img : './Portal/img/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/noImage.jpg' : './Portal/img/noImage.jpg'));
    }

    function path_image2($folder = '', $img = ''){
        $path = ($folder != "") ? '../img/Familiares/' . $img : './Portal/img/Familiares/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/Familiares/noImage.jpg' : './Portal/img/Familiares/noImage.jpg'));
    }
