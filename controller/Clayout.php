<?php
require_once "public/functions.php";

require_once "admin/model/Muser.php";
$user = new user();
include_once "admin/model/Mmenu.php";
$menu = new menu();
require_once "admin/model/Msetting.php";
$setting = new setting();
$menuList = $menu->sorted_menu_list();

/*
require_once "admin/model/Mpage.php";
$page = new page();
$pages = $page->published_page_list();
/*