<?php
//查询分为两种：1种顺序查询 2二分查询、

//顺序查找
function search(&$arr,$finVal){
	$temp = false;
	for($i=0;$i<count($arr);$i++){
		if($finVal==$arr[$i]){
			echo "找到了，下标为=$i";
			$temp = true;
			//break;
		}
	}
	if(!$temp){
		echo '查无此数';
	}
}


//二分查找（前提条件必需是一个有序的数组）
function binarySearch(&$arr,$findVal,$leftIndex,$rigthIndex){
	if($leftIndex>$rigthIndex){
		echo '找不到该数';
		return;
	}
	$middIndex = round(($rigthIndex+$leftIndex)/2);
	if($findVal>$arr[$middIndex]){
		//如果大于向后面找
		binarySearch($arr,$findVal,$middIndex+1,$rigthIndex);
	}else if($findVal<$arr[$middIndex]){
		//如果小于则往前面找
		binarySearch($arr,$findVal,$leftIndex,$middIndex-1);
	}else{
		echo "已经找到了下标是=$middIndex";
	}
}


//$arr = array(1,3,9,10,90,98);
//binarySearch($arr,13,0,count($arr)-1);
//search($arr,-5);
/*
for($i=1;$i<=10;$i++){
	
	for($k=1;$k<=10-$i;$k++){
		echo "&nbsp;";
	}
	for($j=1;$j<=($i-1)*2+1;$j++){
		echo "*";
	}
	echo '<br/>';
}
*/

echo '<table border="1" align="center" cellpadding="1" cellspace="1">';
for($i=1;$i<=9;$i++){
	echo "<tr>";
	for($j=1;$j<=$i;$j++){
		$p=$i*$j;
		echo "<td>$i*$j=$p</td>";
		echo "&nbsp;";
	}
	echo '<tr>';
}
echo "</table>";






