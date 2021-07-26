<?php

define("Root", preg_replace("/\/app.*$/", "", __DIR__));
define("App", Root."/app");

require_once(App."/core/Loader.php");
