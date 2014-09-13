<?php 
function recload($target){
$file=file_get_contents('record/'.$target.'.txt');
$fa=explode('|||',$file);
$ra=array();
foreach ($fa as $line)
{
	$a=array();
	$la=explode('||',$line);
	if (isset($la[1]))
	{
		$a['name']=$la[0];
		$a['time']=$la[1];
		$a['rec']=trim($la[2]);
		array_push($ra,$a);
	}
}
return $ra;
}



