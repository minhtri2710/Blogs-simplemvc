<?php

function logout_index() {
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    header('Location:/index.php');
}