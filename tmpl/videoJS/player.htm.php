<?php
    $videosInPlaylist = Provider::getVideosForPlaylist($pid);
    $video = Provider::getVideo($vid);
?>

<div class="container" style="max-width: 90%;">
	<div class="row">
        <div class="col-sm-8">
            <div content="Content-Type: video/mp4">
                <h3 style="text-align: left; padding-left: 3%;"><?php echo $video->getTitle()?></h3>
                <br>          	                
           		<video id='my-video' class='video-js' controls preload='auto' style="max-width: 95%; min-width: 95%; border: 1px solid black;"
                      poster="data:image/png;base64, <?php echo base64_encode($video->getThumbnail())?>" data-setup='{}'>
                		<source src="<?php echo "data:video/mp4;base64, " . base64_encode($video->getVideo()) ?>" type='video/mp4'>
              	</video>
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
                	   	
                <h7 class="float-right" style="margin-right: 6%;"><span class="glyphicon glyphicon-time"></span><?php echo "  " . gmdate("i:s", $video->getDuration()) ?></h7>
                <h7 class="float-right" style="margin-right: 3%;"><span class="glyphicon glyphicon-eye-open"></span><?php echo "  " . $views ?></h7>
            	<br><br>
    		</div>
        </div>
        <div class="col-sm-4">
        <h3 style="text-align: left;">Other Videos</h3>
        <br>
        	<?php foreach ($videosInPlaylist as $videoInPlaylist) { 
        	    if($videoInPlaylist->getVid() != $video->getVid()) {
    	    ?>
            	<a class="row" href="<?php echo $webroot . "videoJS/playlist/" . $pid . "/video/" . $videoInPlaylist->getVid() ?>">
                	<img class="float-left" height="130" width="180" style="margin-right: 10px;" src="data:image/png;base64, <?php echo base64_encode($videoInPlaylist->getThumbnail()) ?>">
                	<h6 style="text-align: left; padding-left: 1%"><?php echo $videoInPlaylist->getTitle() ?></h6>
    			</a>
    			<br>
        	<?php 
        	    }
        	}
        	?>  
    	   
        	
        </div>
  </div>
</div>

