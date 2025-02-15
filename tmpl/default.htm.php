<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Noel Oliveira">
<title><?php echo $title?></title>

<link rel="icon" href="<?php echo $webroot?>icon.ico">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo $webroot?>css/glyphicon.css">
<link rel="stylesheet" href="<?php echo $webroot?>css/cover.css">
<link rel="stylesheet" href="<?php echo $webroot?>css/basics.css">
<link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet">


<!-- Custom styles for this template -->
<?php Renderer::stylesheets( $stylesheets )?>
</head>
<body class="text-center">
    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
    
        <?php $nav ? include( Config::PATH_TEMPLATE . 'navigation.htm.php' ) : null; ?>
        
        <main role="main" class="inner">
        	<?php FileUtil::exists( $template ) ? include( $template ) : null; ?>
        </main>
        
    </div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
	<script src='https://vjs.zencdn.net/7.5.5/video.js'></script>
	
    <!-- Custom scripts for this template -->
    <?php Renderer::scripts( $scripts )?>
</body>
</html>
