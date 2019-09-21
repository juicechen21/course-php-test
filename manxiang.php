<?php

//工厂模式
class Memcache{
	public function set(){
		echo "Memcache类set方法";
	}
	public function get(){
		echo "Memcache类get方法";
	}
	public function delete(){
		echo "Memcache类delete方法";
	}
}

class Redis{
	public function set(){
		echo "Redis类set方法";
	}
	public function get(){
		echo "Redis类get方法";
	}
	public function delete(){
		echo "Redis类delete方法";
	}
}

class Cache{
	public static function factory(){
		return new Memcache();
	}
}

$cache = Cache::factory();
$cache->delete();

/*
//单例模式
class Test{
	private static $_instance = null;
	private function __construct(){
		echo "momo...";
	}
	
	private function __clone(){
		echo "bobo...";
	}
	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){//判断是否重复实例化类
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
$Test1 = Test::getInstance();
$Test2 = Test::getInstance();
$Test3 = Test::getInstance();
$Test4 = Test::getInstance();
var_dump($Test1);
var_dump($Test2);
var_dump($Test3);
var_dump($Test4);
*/

/*
//抽象类（abstract）
abstract class AB{
	public function holi(){
		echo "明天放假七天...";
	}
	public function test(){}
	public function tesb(){}
}
class Ac extends AB{
	public function test(){
		echo "什么时候放假...";
	}
	public function tesb(){
		$this->holi();
		echo "去海边玩吧...";
	}
}
$user = new Ac();
$user->test();
$user->tesb();
*/



/*
//接口继承
interface Ai{
	const ABC = '测试数据';//常量
	public function test();
}
interface Ac{
	public function tesb();
}

//interface Ab extends Ai,Ac{
//}

class T implements Ai,Ac{
	public function test(){
		echo "吃牛排...";
	}
	public function tesb(){
		echo "写代码...";
	}
}
$user = new T();
$user->test();
$user->tesb();
echo(Ai::ABC);
*/





/*
//接口类
interface Peran{
	public function test();
	public function tesb();
}

class Man implements Peran{
	public function test(){
		echo "吃火锅...";
	}
	public function tesb(){
		echo "睡午觉...";
	}
}
class Woman implements Peran{
	public function test(){
		echo "吃水果...";
	}
	public function tesb(){
		echo "弹钢琴...";
	}
}
class L{
	public static function factory(Peran $user){
		return $user;
	}
}
$user = L::factory(new Woman());
//实现很多业务代码
$user->test();
//实现很多业务代码
$user->tesb();
*/





/*
//trait关键字用来解决PHP只能继承一个类的
trait A{
	public $cc = "哈哈。。";
	public function ab(){
		echo "hello ";
	}
	
}
trait B{
	public function bb(){
		echo "world...";
	}
}
trait C{
	use A,B;
}
class Test{
	use C;
	public function bets(){
		echo($this->cc);
	}
	
}
$test = new Test();
$test->ab();
$test->bb();
$test->bets();
*/