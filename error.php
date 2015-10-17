<?php
// set custom error_handler
set_error_handler('error_handler', E_WARNING);
set_error_handler('error_handler', E_ALL);
?>

<?

function error_handler($errNo, $errStr, $errFile, $errLine)
{
// clear any output that has already been generated
if(ob_get_length()) ob_clean();
//echo $errLine;
$d= file($errFile);
$prt=array_slice($d, $errLine-3,5);
?>

<div style="margin:50px auto;width:60%; padding:2px;">
<style>
pre{
	border:1px solid black;
	padding:3px;
}
span#errLine {
    color: red;
}
</style>

<?php
echo $errStr;
echo '<br>';
echo $errFile;
echo '<pre>';
for ($i = $errLine-3; $i < $errLine+2; $i++) {
    if ($i==$errLine-1){
        echo '<span id="errLine">'.($i+1).'.|'.$d[$i].'</span>';
    }else{
        echo ($i+1).'.|'.$d[$i];
    }
}
echo '</pre>';
?>


</div>
<div style="margin:50px auto;width:60%; padding:2px;">
<pre>
Defined Variables
<?php
//print_r(get_defined_vars());
?>
</pre>
<pre>
Defined Functions
<?php
print_r(get_defined_functions()['user']);
?>
</pre>
</div>


<?php
exit;
}
?>