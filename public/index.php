<?php

require_once(__DIR__."/../app/config/config.php");

use core\Loader;
use core\Router;

Loader::initialize();
$r = new Router;

$r->get("/", "Pages#index");
$r->get("/posts", "Pages#posts");
$r->get("/posts/:id", "Pages#posts");
$r->get("/signup", "Popup#signup");

$r->post("/users/register", "Users#register");

$r->route();
