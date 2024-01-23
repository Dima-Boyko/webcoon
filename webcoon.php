<?php
/*
**************************************************************************************
*File Manager Web Coon
*Version:     0.1
*Date:       23.10.2020
*Author:     Dima Boyko
*Site:       itdix.net
*EMAil:      dimatmg@gmail.com
**************************************************************************************
*/

global $dir;
global $back;

$dir=__DIR__;

if(!empty($_GET['dir'])){
	$dir=$_GET['dir'];
	if(file_exists($dir)==false)$dir=__DIR__;
}
$list_dir=explode('/',$dir);
$back=substr($dir,0,strripos($dir,'/'));



function FileManager(){
	global $dir;
	
	$files = scandir($dir);
	foreach($files as $file){
		if($file=='.' OR $file=='..') continue;
		
		if(is_dir($dir.'/'.$file)){
			$url=$dir.'/'.$file;
			$url=urlencode($url);
			?>
			<div class="Row">
			<a href="?dir=<?php echo  $url?>"><?php echo $file;?></a>
			
			</div>
			<?php
		}else{
			?>
			<div class="Row">
			<?php echo $file;?>
			</div>
			<?php
		}
		
	}
}


function Template(){
	
global $dir;
global $back;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Web Coon</title>
	<style>
	</style>
</head>
<body>
	
	<div class="FileManager">
		<div class="Path"><?php echo $dir?></div>
		<div class="FileList">
		<div class="Row">
			<a href="?dir=<?php echo  $back?>">&#8656;</a>
		</div>
		<?php FileManager();?>
		</div>
	</div>
	<script></script>
</body>
</html>	
<?php
}

Template();



