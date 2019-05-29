<?php 
    $video = Provider::getVideo();
?>

<div content="Content-Type: video/mp4">
    <!-- poster="image" preload="metadata" -->
    <video controls autoplay muted style="max-width: 95%;">
        <source src="data:video/mp4;base64,<?php echo base64_encode($video) ?> "/>
    </video>
</div>

