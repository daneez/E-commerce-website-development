<?php

function secure_session_start(){
  $lifetime = 3600; //one hour in seconds
  $path = "/";
  $domain = "localhost";
  $secure = FALSE;
  $httponly = TRUE; // not successful by javascript
  session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

  session_start();
}