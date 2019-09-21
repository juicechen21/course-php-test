<?php
class provs{
	function jsonReturn($code,$mag,$data){
		exit(json_encode(array(
			"code" => $code,
			"msg" => $mag,
			"data" => $data,
		),JSON_UNESCAPED_UNICODE));
	}
	//校检身份证
	function Check_ID($val){
		if(!preg_match('/^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/',$val)){
			die("ID card format error");
		}
		//校检地区
		$provs_val = substr($val,0,2);
		$provs = array(
			"11" => "北京",
			"12" => "天津",
			"13" => "河北",
			"14" => "山西",
			"15" => "内蒙古",
			"21" => "辽宁",
			"22" => "吉林",
			"23" => "黑龙江 ",
			"31" => "上海",
			"32" => "江苏",
			"33" => "浙江",
			"34" => "安徽",
			"35" => "福建",
			"36" => "江西",
			"37" => "山东",
			"41" => "河南",
			"42" => "湖北",
			"43" => "湖南",
			"44" => "广东",
			"45" => "广西",
			"46" => "海南",
			"50" => "重庆",
			"51" => "四川",
			"52" => "贵州",
			"53" => "云南",
			"54" => "西藏 ",
			"61" => "陕西",
			"62" => "甘肃",
			"63" => "青海",
			"64" => "宁夏",
			"65" => "新疆",
			"71" => "台湾",
			"81" => "香港",
			"82" => "澳门"
		);
		@$provincial = $provs[$provs_val]?$provs[$provs_val]:die("no meets the rule");
		//校检出生年月日
		$time_val = substr($val,6,8);
		$year = substr($time_val,0,4);
		$month = substr($time_val,4,2);
		$day = substr($time_val,6,2);
		$host = $year."-".$month."-".$day;
		$date = ($host != date('Y-m-d',strtotime($host)))?die("Date format error"):$host;
		//校检身份证后四位
		$code = substr($val,-1,1);
		$factor = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
		$parity = array(1,0,'X',9,8,7,6,5,4,3,2);
		$sum =0;
		for($i=0;$i<17;$i++) {
			$sum += $val[$i]*$factor[$i];
		}
		//var_dump($parity[$sum%11]);exit;
		if($parity[$sum % 11] == strtoupper($code)) {
			$star = $this->Check_Star($val);//校检星座
			$zodiac = $this->Check_Zodiac($val);//校检星座
			$data = array(
				'provincial' => $provincial,
				'born_date'  => $date,
				'zodiac'	 => $zodiac,
				'star_seat'  => $star,
				'id_card'    => $val,
			);
			return json_encode($data,JSON_UNESCAPED_UNICODE);
			$this->jsonReturn(200,'ok',$data);
		}else{
			die("ID card error");
		}
	}
	

    //根据身份证号，自动返回对应的星座
    function Check_Star($cid){
        $bir = substr($cid, 10, 4);
        $month = (int)substr($bir, 0, 2);
        $day = (int)substr($bir, 2);
        $strValue = '';
        if (($month == 1 && $day <= 21) || ($month == 2 && $day <= 19)) {
            $strValue = "水瓶座";
        } else if (($month == 2 && $day > 20) || ($month == 3 && $day <= 20)) {
            $strValue = "双鱼座";
        } else if (($month == 3 && $day > 20) || ($month == 4 && $day <= 20)) {
            $strValue = "白羊座";
        } else if (($month == 4 && $day > 20) || ($month == 5 && $day <= 21)) {
            $strValue = "金牛座";
        } else if (($month == 5 && $day > 21) || ($month == 6 && $day <= 21)) {
            $strValue = "双子座";
        } else if (($month == 6 && $day > 21) || ($month == 7 && $day <= 22)) {
            $strValue = "巨蟹座";
        } else if (($month == 7 && $day > 22) || ($month == 8 && $day <= 23)) {
            $strValue = "狮子座";
        } else if (($month == 8 && $day > 23) || ($month == 9 && $day <= 23)) {
            $strValue = "处女座";
        } else if (($month == 9 && $day > 23) || ($month == 10 && $day <= 23)) {
            $strValue = "天秤座";
        } else if (($month == 10 && $day > 23) || ($month == 11 && $day <= 22)) {
            $strValue = "天蝎座";
        } else if (($month == 11 && $day > 22) || ($month == 12 && $day <= 21)) {
            $strValue = "射手座";
        } else if (($month == 12 && $day > 21) || ($month == 1 && $day <= 20)) {
            $strValue = "魔羯座";
        }
        return $strValue;
    }
	
	//根据身份证号，自动返回对应的生肖
    function Check_Zodiac($cid){
        $start = 1901;
        $end = $end = (int)substr($cid, 6, 4);
        $x = ($start - $end) % 12;
        $value = "";
        if ($x == 1 || $x == -11) {
            $value = "鼠";
        }
        if ($x == 0) {
            $value = "牛";
        }
        if ($x == 11 || $x == -1) {
            $value = "虎";
        }
        if ($x == 10 || $x == -2) {
            $value = "兔";
        }
        if ($x == 9 || $x == -3) {
            $value = "龙";
        }
        if ($x == 8 || $x == -4) {
            $value = "蛇";
        }
        if ($x == 7 || $x == -5) {
            $value = "马";
        }
        if ($x == 6 || $x == -6) {
            $value = "羊";
        }
        if ($x == 5 || $x == -7) {
            $value = "猴";
        }
        if ($x == 4 || $x == -8) {
            $value = "鸡";
        }
        if ($x == 3 || $x == -9) {
            $value = "狗";
        }
        if ($x == 2 || $x == -10) {
            $value = "猪";
        }
        return $value;
    }
}
@$iden = $_POST['id_card']?$_POST['id_card']:die('ID card is empty');
//$iden = '36242619710329061X';
//$iden = '36242619710606061X';
//$iden = '450881199305204132';
$provs = new provs();
$data = $provs->Check_ID($iden);
print_r($data);
//var_dump($data);


