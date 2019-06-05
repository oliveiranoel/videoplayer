<?php 
    $video = Provider::getVideo(1);
    $playlists = Provider::getPlaylists();
    $playlistVideoAssign;
    $videos;
?>

<h3 class="float-left" style="padding-left: 4%;"><?php echo $video->getTitle()?></h3>
<div content="Content-Type: video/mp4">
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
      		        foreach ($video as $playlist)
      		?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
              	<img >
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                  <p class="card-text" style="color: #6c757d"><?php echo $playlist->getName() ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            
		</div>
	</div>
</div>

