<?php

spl_autoload_register(function ($classname){
    include "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/LibraryApp/".str_replace("\\", "/", "$classname").".php";
});
