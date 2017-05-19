<?php

if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
const MESSAGEFLASH = 'MessageFlash';

function SetFlashMessage($msg)
{
    $_SESSION[MESSAGEFLASH] = $msg;
}

function GetFlashMessage()
{
    $msg = empty($_SESSION[MESSAGEFLASH]) ? '' : $_SESSION[MESSAGEFLASH];
    unset($_SESSION[MESSAGEFLASH]);
    return $msg;
}
