<?php

require_once(__DIR__."/../app/config/config.php");

use core\Loader;
use core\Router;

Loader::initialize();
$r = new Router;

$r->get("/", "Pages#index");
$r->get("/posts", "Pages#posts");
$r->get("/about", "Pages#about");
$r->get("/contact", "Pages#contact");
$r->get("/posts/:id", "Pages#posts");

$r->post("/signup", "Popup#signup");
$r->post("/users/register", "Users#register");
$r->post("/footer/:screen", "Footer#show");
$r->post("/users/login", "Users#login");

$r->route();
