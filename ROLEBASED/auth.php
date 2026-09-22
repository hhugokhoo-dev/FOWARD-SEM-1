<?php
function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function isEditor() {
    return isset($_SESSION['user']) &&
           in_array($_SESSION['user']['role'], ['editor', 'admin']);
}

function isUser() {
    return isset($_SESSION['user']);
}

function isGuest() {
    return !isset($_SESSION['user']);
}