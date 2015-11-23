<?php

function logout_index() {
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    header('Location: http://simplemvc.vn:3030/index.php');
}