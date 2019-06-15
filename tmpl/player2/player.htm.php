<?php
    $video = Provider::getVideo(1);
?>

<!-- jwplayer doesnt works anymore, issues with blobs. Will not be graded, discussed with Mr. Mosimann -->
<div content="Content-Type: video/mp4">
    <video src="assets/video1.mp4" id="container"></video> 
    <script type="text/javascript"> 
    	jwplayer("container").setup({ 
        	flashplayer: "js/jwplayer/jwplayer-7.11.2/jwplayer.flash.swf",
        	key: "7Jxu3WZus1Dv1+GbGmbwin7QKiTPAkVYxmItTw==",
        	file: "<?php echo "data:video/mp4;base64, " . base64_encode($video->getVideo())?>",
        	image: "assets/thumbnail1.png",
        	title: "<?php echo $video->getTitle()?>"
    	}); 
     </script>
</div>