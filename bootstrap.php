<?php
/*
 * わったーおかー
 * まずはおかーに相談する
 */

require 'core/ClassLoader.php';

$classLoader = new ClassLoader();
$classLoader->registerDir(dirname(__FILE__).'/core');
$classLoader->register();
