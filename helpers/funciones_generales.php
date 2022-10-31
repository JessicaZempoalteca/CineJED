<?php
    function path_image($folder = '', $img = ''){
        $path = ($folder != "") ? '../img' . $img : './Portal/img/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/noImage.jpg' : './Portal/img/noImage.jpg'));
    }