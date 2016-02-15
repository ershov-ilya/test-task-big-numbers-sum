<?php
 /**
 * Created by PhpStorm.
 * Author:   ershov-ilya
 * GitHub:   https://github.com/ershov-ilya/
 * About me: http://about.me/ershov.ilya (EN)
 * Website:  http://ershov.pw/ (RU)
 * Date: 15.02.2016
 * Time: 12:48
 */

$start =microtime( true) ;
header( 'Content-Type: text/plain; charset=utf-8' ) ;
//if(isset($_GET['t']))
define( 'DEBUG' , true ) ;
defined( 'DEBUG') or define('DEBUG' , false) ;

if( DEBUG ){
    error_reporting( E_ERROR | E_WARNING ) ;
    ini_set( "display_errors" , 1 ) ;
}

$data=file('data.php');
// Вырезаем php exit;
unset($data[0]);

$i=0;
foreach($data as $str){
    print $i.') '.$str.PHP_EOL;
    $i++;
}

