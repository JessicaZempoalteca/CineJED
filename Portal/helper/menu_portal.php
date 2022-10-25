<?php
function crear_menu(){
    $html = '
    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
        <li class="nav-item"><a class="nav-link" href="./index.html">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="./pages/portafolio.html">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="./pages/about.html">About</a></li>
        <li class="nav-item"><a class="nav-link" href="./pages/team.html">Team</a></li>
        li class="nav-item"><a class="nav-link" href="./pages/contact.html">Contact</a></li>
    </ul>
    ';
    retunr $html;

}
?>