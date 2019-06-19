<?php
    $playlists = Provider::getPlaylists();
    $playlistVideoAssign = Provider::getPlaylistVideoAssign();
    $videos = Provider::getVideos();
        
    if (Config::HTMLPlayer) {
        $activePlayer = "htmlPlayer";
    } else {
        $activePlayer = "videoJS";
    }
?>

<section class="jumbotron text-center" style="color: #696969;">
    <div class="container">
  		<h1 class="jumbotron-heading">Playlists</h1>
      	<p class="lead text-muted"><b>Choose you Playlist and have a look at the Videos in your choosen Playlist. </b><br>When dumping the SQL make sure that the Path to your local xampp folder is correct. The used Player can be changed by a config variable in the code. </p>
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
                      <a href="<?php echo $webroot . $activePlayer . "/playlist/" . $playlist->getPid() . "/video" ?>">
                      	<div class="d-flex justify-content-center">
          					<img style="border: 1px solid; border-radius: 5px;" width="350" height="220" src="data:image/png;base64, <?php echo base64_encode($playlist->getThumbnail()) ?>">
                      	</div>
                      </a>
                      	
                        <div class="card-body">
                          <p class="card-text" style="color: #6c757d"><?php echo $playlist->getName() ?></p>
                          <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
              		        <?php 
                  		        $durationInPlaylist = 0;
                  		        foreach ($playlistVideoAssign as $playlistVideo) {
                  		            if ($playlistVideo->getPid() == $playlist->getPid()) { 
                                    	foreach($videos as $video) {
                                    	    if ($playlistVideo->getVid() == $video->getVid()) {
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
