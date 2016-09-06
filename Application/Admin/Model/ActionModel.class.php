<?php
namespace Admin\Model;
use Think\Model;
class ActionModel extends Model{
	//要模型名和数据表名不相同，必须在该模型页面赋一个数据表名！！！！
	protected $tableName='admin';
	/*tableName	不包含表前缀的数据表名称，一般情况下默认和模型名称相同，只有当你的
				表名和当前的模型类的名称不同的时候才需要定义。*/
		
		//通过GD库做验证码！！！
	function verifyImage($type=3, $length=4, $pixel=10, $line=0){		
			//参数：类型、长度、点数、线数、名称
		$width=80;
		$height=40;
		$image=imagecreatetruecolor($width, $height);	//创建画布
		$white=imagecolorallocate($image, 255, 255, 255);//白色填充画布
		$black=imagecolorallocate($image, 0, 0, 0);  //画笔颜色
		//用填充矩形填充画布
		imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
		
		$chars=$this->buildRandomString($type,$length);	 //想在类本身内部使用本类的属性或者方法，要用'$this->'!!!
														//'$this',一个用来表示类内部的属性和方法的代号		
		session_start();
		$_SESSION['verifyImg']=$chars;
		$fontfiles=array("SIMLI.TTF","SIMYOU.TTF","STZHONGS.TTF","ELEPHNT.TTF","1.ttf","3.ttf");
		//$fontfiles=array("1.ttf","2.ttf","5.ttf");

			//每次写一个验证码
		for($i=0;$i<$length;$i++){		
			$size=mt_rand(16,19);	//随机大小
			$angle=mt_rand(-15,15);	//随机角度
			$x=5+$i*$size;		//横坐标
			$y=mt_rand(20,25);	//纵坐标
			$fontfile=THINK_PATH."/Library/Think/Verify/ttfs/".$fontfiles[mt_rand(0,count($fontfiles)-1)];	//随机取出一个字体。****该路径很重要！！！
			//$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];	//出错
			$text=substr($chars,$i,1);	
			$color=imagecolorallocate($image, mt_rand(50,90), mt_rand(80,200), mt_rand(90,180));
				//随机颜色
			//imagettftext($image, $size, $angle, $x, $y, $color, "C:/Windows/Fonts/SIMLI.TTF", $text);
			imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
		}

		//画点作为干扰元素
		if($pixel){
			for($i=0;$i<$pixel;$i++){
				imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $black);
			}
		}	

		//直线作为干扰元素		
		if($line){
			for($i=0;$i<$line;$i++){
				$color=imagecolorallocate($image, mt_rand(50,90), mt_rand(50,90), mt_rand(50,90));
				imageline($image, mt_rand(2,$width-40), mt_rand(0,$height-20),mt_rand(0,$width-20), mt_rand(0,$height-10), $color);
			}
		}
		header("content-type:image/png");	//显示前告诉浏览器，要显示的资源类型
		imagepng($image);	//显示画布
		imagedestroy($image);	//销毁图像资源
	}

	//产生随机字符串
	function buildRandomString($type=3,$length=4){
		if($type==1){
			$str=join("",range(0, 9));		//用""连接数组
		}else if($type==2){
			$str=join("",array_merge(range("a", "z"),range("A", "Z")));
		}else if($type==3){
			$str=join("",array_merge(range("a", "z"),range("A", "Z"),range(0, 9)));
		}
		if($length>strlen($str)){
			exit("字符串长度不够");
		}
		$str=str_shuffle($str);		//随机打乱
		return substr($str,0,$length);		//截取
	}
}