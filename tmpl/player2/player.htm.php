<?php
    $playlists = Provider::getPlaylists();
    $playlistVideoAssign;
    $videos;
?>

<section class="jumbotron text-center" style="background-color: #333; margin-top: 6%;">
    <div class="container">
  		<h1 class="jumbotron-heading">Playlist</h1>
      	<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
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