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

try{
    $data=file('data.php');
    // Вырезаем php exit;
    unset($data[0]);

    // Инициируем копилку
    $arr_sum=array();
    for($i=0; $i<=strlen($data[1]); $i++){
        $arr_sum[$i]=0;
    }
    // Копилка готова

    throw new Exception('test', 200);

    $y=0;
    foreach($data as $str){
        print $y.') '.$str.PHP_EOL;
        $x=0;
        $next_digit=0;
        for($i=strlen($str);$i--;){
            print $str[$i];
            $x++;
        }
        break;
        $y++;
    }

} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "(code: ".$e->getCode().")\n";
}
