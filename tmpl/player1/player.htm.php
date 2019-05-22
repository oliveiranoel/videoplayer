<?php 
    $videos = Provider::getVideos();
?>

<h1>Player 1</h1>

<div class="container">
    <video class="w-100 h-100" autoplay controls>
        <source src="<?php echo $webroot . Config::PATH_IMAGE . "SampleVideo1.mp4" ?>" type="video/mp4">
    </video>
</div>


