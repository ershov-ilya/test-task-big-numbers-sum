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
    if(empty($data)) throw new Exception('No data', 400);
    // Вырезаем php exit;
    unset($data[0]);

    // Инициируем копилку
    $arr_sum=array();
    for($i=0; $i<=strlen($data[1]); $i++){
        $arr_sum[$i]=0;
    }
    // Копилка готова

    // Построчный перебор
    $str_no=0;
    foreach($data as $str){
        $str=trim($str);
        print $str_no.') '.$str.PHP_EOL;
        $d=0;
        for($i=strlen($str);$i--;){
            $next_digit=0;
            $arr_sum[$d]+=$str[$i];
            if($arr_sum[$d]>9){
                $next_digit=floor($arr_sum[$d]/10);
                $arr_sum[$d]%=10;
                $arr_sum[$d+1]+=$next_digit;
            }
            $d++;
        }
        $str_no++;
    }

} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "(code: ".$e->getCode().")\n";
    exit;
}
$sum='';
for($i=count($arr_sum);$i--;) {
    $sum.=$arr_sum[$i];
}
$sum=ltrim($sum, '0');
print "\nResult:\n";
if(DEBUG){
//    print_r($arr_sum);
}
print $sum.PHP_EOL;
