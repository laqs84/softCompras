<?php
if(!empty($_GET['input'])) {
    session_start();
    $_SESSION['input'] = $_GET['input'];
}