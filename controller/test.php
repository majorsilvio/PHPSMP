<?php 

ob_start();
include dirname(__file__).'/../views/test1.php';
$string	= ob_get_clean();
$string = preg_replace('/\{\{test\}\}/', 'opa', $string);
echo $string;
ob_end_flush();


 ?>