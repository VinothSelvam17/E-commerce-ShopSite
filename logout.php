<?php
    session_start();

    unset($_SESSION["aid"]);
    unset($_SESSION["aname"]);

    session_destroy();
    echo'<script>window.open("index.php","_self")</script>';

?>