<?php
session_start();
session_destroy();
header("location: ../templates/initial_page.html.php");