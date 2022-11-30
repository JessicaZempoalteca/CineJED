<?php
    session_start();
    
    session_destroy();
    echo '<script>window.location="../../../User/pages/login.php"</script>';