<?php
    $videosInPlaylist = Provider::getVideosForPlaylist($pid);
    $video = Provider::getVideo($vid);
?>

<!-- jwplayer doesnt works anymore, issues with blobs. Will not be graded, discussed with Mr. Mosimann -->
<div class="container" style="max-width: 90%;">
	<div class="row">
        <div class="col-sm-9">
            <div content="Content-Type: video/mp4">
                <h3 style="text-align: left; padding-left: 3%;"><?php echo $video->getTitle()?></h3>
                <br>          	
            	<video style="max-width: 95%; min-width: 95%; border: 1px solid black;" id="container"></video> 
                <script type="text/javascript"> 
                	jwplayer("container").setup({ 
                    	flashplayer: "js/jwplayer/jwplayer-7.11.2/jwplayer.flash.swf",
                    	key: "7Jxu3WZus1Dv1+GbGmbwin7QKiTPAkVYxmItTw==",
                    	title: "<?php echo $video->getTitle()?>",
                    	image: "assets/thumbnail1.png",
                    	file: "<?php echo "data:video/mp4;base64, " . base64_encode($video->getVideo())?>"
                	}); 
                 </script>
                 <!--  <?php echo "data:video/mp4;base64, " . base64_encode($video->getVideo())?> -->
            	<br>
            	
            	<?php 
                	for($i=1; $i <= 5; $i++){
                        if ($i <= $rating) {
                	    ?>
                	    <a href="<?php echo $webroot?>video/<?php echo $vid?>/rate/<?php echo $i?>" role="button">
                	       <span style="margin-left: 2%" class="float-left glyphicon glyphicon-star"></span>
                	    </a>
                	    <?php } else { ?>
            	        <a href="<?php echo $webroot?>video/<?php echo $vid?>/rate/<?php echo $i?>" role="button">
            	        	<span style="margin-left: 2%" class="float-left glyphicon glyphicon-star-empty"></span>
            	        </a>
                	   	<?php }	}?>
                	   	
                <h7 class="float-right" style="margin-right: 3%;"><span class="glyphicon glyphicon-eye-open"></span><?php echo "  " . $views ?></h7>
            	<br><br>
    		</div>
        </div>
        <div class="col-sm-3">
        <h3 style="text-align: left;">Other Videos</h3>
        <br>
        	<?php foreach ($videosInPlaylist as $videoInPlaylist) { 
        	    if($videoInPlaylist->getVid() != $video->getVid()) {
    	    ?>
            	<a class="row" href="<?php echo $webroot . "jwPlayer/playlist/" . $pid . "/video/" . $videoInPlaylist->getVid() ?>">
                	<img class="float-left" height="130" width="180" style="margin-right: 10px;" src="data:image/png;base64, <?php echo base64_encode($videoInPlaylist->getThumbnail()) ?>">
                	<h4 style="text-align: left; padding-left: 1%"><?php echo $videoInPlaylist->getTitle() ?><br> 
        			<span style="text-align: left; padding-left: 1%; font-size: 0.6em"><?php echo "(" . gmdate("i:s", $videoInPlaylist->getDuration()) . " min)" ?></span>
        			</h4>
    			</a>
    			<br>
        	<?php 
        	    }
        	}
        	?>  
    	   
        	
        </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $webroot . Config::PATH_JS . "jwplayer/jwplayer-7.11.2/jwplayer.js" ?>"></script>

