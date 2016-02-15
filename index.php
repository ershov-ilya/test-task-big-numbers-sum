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

$start = microtime(true) ;
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
        // Удаляем терминаторы строки
        // $str=trim($str);

        // Удаляем вообще всё кроме цифр
        $str=preg_replace('/[^0-9]/','',$str);
        if(empty($str)) continue;
//        if(DEBUG) print $str_no.') '.$str.PHP_EOL;

        // Инверсивный перебор строки
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
        // Конец перебора строки

        $str_no++;
    }

} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "(code: ".$e->getCode().")\n";
    exit;
}

// Формирование строки результата
$sum='';
for($i=count($arr_sum);$i--;) {
    $sum.=$arr_sum[$i];
}
$sum=ltrim($sum, '0');

// Вывод результата в консоль / на экран
if(DEBUG) print "\nResult:\n";
print $sum;
if(DEBUG) {
    print PHP_EOL;
    print "Time: ".(microtime(true)-$start)." sec.".PHP_EOL;
}
