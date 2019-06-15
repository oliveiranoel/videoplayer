<?php 
    $video = Provider::getVideo(1);
    $playlists = Provider::getPlaylists();
    $playlistVideoAssign = Provider::getPlaylistVideoAssign();
    $videos = Provider::getVideos();
?>


<div content="Content-Type: video/mp4">
<h3 style="padding-left: 4%;"><?php echo $video->getTitle()?></h3><br>
    <!-- poster="image" preload="metadata" -->
    <video controls muted style="max-width: 95%;" poster="data:image/png;base64, <?php echo base64_encode($video->getThumbnail())?>">
        <source src="data:video/mp4;base64,<?php echo base64_encode($video->getVideo()) ?> "/>
    </video>
</div>

<div class="album py-5">
	<div class="container">
		<div class="row">
      
      		<?php 
      		    foreach($playlists as $playlist) {
      		        ?>
  		        <div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                      	<div class="d-flex justify-content-center">
          					<img class="w-100 h-100" src="data:image/png;base64, <?php echo base64_encode($playlist->getThumbnail()) ?>">
                      	</div>
                        <div class="card-body">
                          <p class="card-text" style="color: #6c757d"><?php echo $playlist->getName() ?></p>
                          <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
              		        <?php 
                  		        $durationInPlaylist = 0;
                  		        foreach ($playlistVideoAssign as $playlistVideo) {
                  		            if ($playlistVideo->gePid() == $playlist->gePid()) { 
                                    	foreach($videos as $video) {
                                    	    if ($playlistVideo->getVid() == $video->geVid()) {
                                    	       $durationInPlaylist += $video->getDuration();
                                    	    }
                                    	}
              		                }
                  		        }
                  		        echo gmdate("i:s", $durationInPlaylist) . " min";
                        	?>
                            </small>
                          </div>
                        </div>
                      </div>
                </div>
        	<?php 
               }
            ?>
		</div>
	</div>
</div>

