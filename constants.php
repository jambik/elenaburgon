<?php

## Directories - Include
define("INC_DIR",            "includes/");

define("INC_DB",             INC_DIR."db/");
define("INC_SMARTY",         INC_DIR."smarty-2.6.22/");
define("INC_PHPMAILER",      INC_DIR."phpmailer-5.1/");
define("INC_SIMPLECAPTCHA",  INC_DIR."simplecaptcha-0.1/");
define("INC_IMAGETRANSFORM", INC_DIR."imagetransform-1.0.5/");

define("INC_JQUERY",         INC_DIR."jquery-2.0.3/");
define("INC_JQUERY_UI",      INC_DIR."jquery-ui-1.8.17/");
define("INC_JQUERY_PLUGINS", INC_DIR."jquery-plugins/");
define("INC_CKEDITOR",       INC_DIR."ckeditor-3.6.4/");

## Directories
define("ADMIN_DIR",     "admin/");
define("ADMIN_TPL_DIR", ADMIN_DIR."tpl/");
define("FILES_DIR",     "files/");

## Directories - Smarty
define("SMARTY_TEMPLATES_DIR", "templates/");
define("SMARTY_COMPILE_DIR",   "temp/");
define("SMARTY_CACHE_DIR",     "cache/");

## Tables
define("TABLE_ADMIN",      "admin");
define("TABLE_LOG",        "log");
define("TABLE_PAGES",      "pages");
define("TABLE_ARTICLES",   "articles");
define("TABLE_GALLERY",    "gallery");
define("TABLE_PHOTOS",     "photos");
define("TABLE_SETTINGS",   "settings");

// Admin
define("ADMIN_EXPIRED", 3600);

?>