<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
				<?php if (!isset($_REQUEST["playlist"])) {
			
				$songs=glob("songs/*.mp3");
				foreach ($songs as $value) { ?>

					<li class="mp3item"><a href="<?php echo $value; ?>"><?php echo basename($value),"("; $fsize=filesize($value); if ($fsize<1024)
					{echo $fsize."b";}
					elseif ($fsize<1048576) {echo round($fsize/1024). "kb";}
					else {echo round($fsize/1048576). "mb";	} echo ")";
					?></a></li>

				<?php } ?>

				<?php 
				$playlists=glob("songs/*.txt");
				foreach ($playlists as $value) { ?>
					<li class="playlistitem"><a href=" <?php echo $value; ?>"> <?php echo basename($value) ?></a></li>
				<?php }} ?>


				<?php if(isset($_REQUEST["playlist"])){
		        $playlist=$_REQUEST["playlist"];
				$slist=file_get_contents("songs/".$playlist);
				$songArray=explode("\n", $slist);
				foreach ($songArray as $value) { 
				 ?>
				 <li class="mp3item"><a href=" songs/<?php  echo $value; ?>"> <?php echo $value; ?></a></li>
				<?php } }?>

			</ul>
		</div>
	</body>
</html>
