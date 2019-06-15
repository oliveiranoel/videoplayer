<?php
    $playlists = Provider::getPlaylists();
    $playlistVideoAssign = Provider::getPlaylistVideoAssign();
    $videos = Provider::getVideos();
?>

<section class="jumbotron text-center" style="background-color: #333; margin-top: 6%;">
    <div class="container">
  		<h1 class="jumbotron-heading">Playlist</h1>
      	<p class="lead text-muted">Something short and leading about the collection below its contents, the creator, etc. Make it short and sweet, but not too short so folks dont simply skip over it entirely.</p>
    </div>
</section>

<div class="album py-5">
	<div class="container">
		<div class="row">
      
      		<?php 
      		    foreach($playlists as $playlist) {
      		        ?>
  		        <div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                      <a href="<?php echo $webroot . "player1"?>">
                      	<div class="d-flex justify-content-center">
          					<img class="w-100 h-100" src="data:image/png;base64, <?php echo base64_encode($playlist->getThumbnail()) ?>">
                      	</div>
                      </a>
                      	
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
