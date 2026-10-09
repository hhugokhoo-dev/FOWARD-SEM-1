<?php
if (session_status() === PHP_SESSION_NONE){
session_start();
}
// STEP 1: isAdmin()
// Returns true only if the current user's role is 'admin'
function isAdmin()
{
  if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( $_SESSION['user']['role'] === 'admin' ) {
            return true;
        } 
    } 
        
    return false;
}

// STEP 2: isEditor()
// Returns true if the current user's role is 'editor' or 'admin'
function isEditor()
{
    if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( 
            $_SESSION['user']['role'] === 'editor' || 
            $_SESSION['user']['role'] === 'admin' 
        ) {
            return true;
        } 
    } 
        
    return false;
}

// STEP 3: isUser()
// Returns true if any user is logged in (any role)
function isUser()
{
    // check if user's session is available or not
    if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( 
            $_SESSION['user']['role'] === 'admin' || 
            $_SESSION['user']['role'] === 'editor' || 
            $_SESSION['user']['role'] === 'user' 
        ) {
            return true;
        } 
    } 
        
    return false;
}

// STEP 4: isGuest()
// Returns true if no user is logged in
function isGuest()
{
    return ! isset( $_SESSION['user'] );
}
