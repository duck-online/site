<?php
if((isset($_GET['people']))&&(isset($_GET['fz'])))
{
	$_GET['people']=json_decode($_GET['people']);
	$fz=json_decode(file_get_contents('./fz.json'),1);
	foreach ($fz as $sl){
		foreach ($sl['people'] as $people){
			$tmp=array();
			if (strcmp($people,$_GET['people'])!=0)array_push($tmp,$people);
			$sl['people']=$tmp;
		}
	}
	foreach ($fz as $sl){
		if (strcmp($sl['id'],$_GET['fz'])==0)
		{
			echo "\nfind\n";
			if(!(is_array($sl['people'])))$sl['people']=array($_GET['people']);
			else array_push($sl['people'],$_GET['people']);
			var_dump($fz);
		}


	}
	file_put_contents('fz.json',json_encode($fz));
}

