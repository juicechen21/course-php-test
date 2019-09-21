<?php 
//冒泡排序
function bubbleSort(&$arr){
	$temp = 0;
	for($i=0;$i<count($arr)-1;$i++){
		for($j=0;$j<count($arr)-1-$i;$j++){
			if($arr[$j]>$arr[$j+1]){
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
	}
	return $arr;
}

//选择排序
function selectSort(&$arr){
	$temp = 0;
	for($i=0;$i<count($arr)-1;$i++){
		//假设 $i就是最小值
		$minVal = $arr[$i];
		//记录我认为的最小值的下标
		$minInd = $i;
		for($j=$i+1;$j<count($arr);$j++){
			//说明我们认为的最小值，其实不是最小值
			if($minVal>$arr[$j]){
				$minVal = $arr[$j];
				$minInd = $j;
			}
		}
		//最后交换位置
		$temp = $arr[$i];
		$arr[$i] = $arr[$minInd];
		$arr[$minInd] = $temp;
	}
	return $arr;
}

//插入排序
function insertSort(&$arr){
	//先默认下标为0的这个数值已经是有序
	for($i=1;$i<count($arr);$i++){
		//$insertVal准备插入的数
		$insertVal = $arr[$i];
		//准备先和$insertKey比较
		$insertKey = $i-1;
		//如果满足这个条件说明还没有找到适当的位置
		while($insertKey>=0 && $insertVal<$arr[$insertKey]){
			//同时把数往后移
			$arr[$insertKey+1] = $arr[$insertKey];
			$insertKey--;
		}
		if($i != $insertKey+1){
			$arr[$insertKey+1] = $insertVal;
		}
	}
	return $arr;
}

//插入排序从（大到小排序）
function insertDesc($arr){
	for($i=1;$i<count($arr);$i++){
		$insertVal = $arr[$i];
		$insertKey = $i-1;
		while($insertKey>=0&&$insertVal>$arr[$insertKey]){
			$arr[$insertKey+1] = $arr[$insertKey];
			$insertKey--;
		}
		if($i != $insertKey+1){
			$arr[$insertKey+1] = $insertVal;
		}
	}
	return $arr;
}

//快速排序
function quick_sort($left,$right,&$array){
	$l = $left;
	$r = $right;
	$pivot = $array[($left+$right)/2];
	$temp = 0;
	
	while($l<$r){
		while($array[$l]<$pivot)$l++;//从小到大排序
		while($array[$r]>$pivot)$r--;//从小到大排序
		
		//while($array[$l]>$pivot)$l++;//从大到小排序
		//while($array[$r]<$pivot)$r--;//从大到小排序
		
		if($l>=$r)break;
		
		$temp = $array[$l];
		$array[$l] = $array[$r];
		$array[$r] = $temp;
		
		if($array[$l] == $pivot) --$r;
		if($array[$r] == $pivot) ++$l;
		
	}
	if($l == $r){
		$l++;
		$r--;
	}
	if($left<$r)quick_sort($left,$r,$array);
	if($right>$l)quick_sort($l,$right,$array);
	//return $array;
}



date_default_timezone_get('Asia/Shanghai');
echo '排序前的时间：'.date('Y-n-d G:i:s');
echo "<br/>";
//$arr = array(1,13,0,-9,99,102,5,7,-88);
$arr = array();
for($i=0;$i<10;$i++){
	$arr[$i] = rand(-1000,3000);
}
//print_r($arr);
echo "<br/>";
echo "<br/>";
//bubbleSort($arr);
//selectSort($arr);
//insertSort($arr);
quick_sort(0,count($arr)-1,$arr);
echo '排序后的时间：'.date('Y-n-d G:i:s');
echo "<br/>";
print_r($arr);

echo "<br/>";
































?>