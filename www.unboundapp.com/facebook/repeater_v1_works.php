<?php
function curPageURL() {
 $pageURL = 'http://';
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>

<html>
  <head prefix="og: http://ogp.me/ns# unboundapp: http://ogp.me/ns/unboundapp#">
    <meta property="fb:app_id" content="<?php echo strip_tags($_REQUEST['fb:app_id']);?>">
     <meta property="og:url" content="<?php echo strip_tags(curPageURL());?>">
	<!-- <meta property="og:url" content="https://www.dropbox.com/s/hs3d1vbpc5drfza/DSC_4571.jpg"> -->

      <meta property="og:type" content="<?php echo strip_tags($_REQUEST['og:type']);?>">
      <meta property="og:title" content="<?php echo strip_tags($_REQUEST['og:title']);?>">
      <!-- <meta property="og:image" content="https://dl.dropboxusercontent.com/s/hs3d1vbpc5drfza/DSC_4571.jpg?token_hash=AAHv5dWvU6FB87o0yyQIuEA3zNH2HBzrU0KJa87X1BybMw&dl=1"> -->
 	<meta property="og:image" content="<?php echo strip_tags($_REQUEST['og:image']);?>">
<!-- -->
      <meta property="og:description" content="<?php echo strip_tags($_REQUEST['og:description']);?>">
      <title>Unbound App</title>
  </head>
    <body>
	<!--<iframe src="http://www.unboundapp.com" style="border:0px #FFFFFF none;" name="myiFrame" scrolling="yes" frameborder="1" marginheight="0px" marginwidth="0px" height="100%" width="100%"></iframe> -->
	<!--<iframe src="http://www.unboundapp.com" style="border:0px #FFFFFF none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="768px" width="1024px"></iframe>
	<img src="http://s3.amazonaws.com/UnboundApp/img/unbound-dropbox-icon.jpg"/>
	 <br/>
	<?php echo strip_tags($_REQUEST['body']);?>

<iframe src="<?php echo strip_tags($_REQUEST['og:image']);?>" style="border:0px #FFFFFF none;" name="myiFrame" scrolling="yes" frameborder="1" marginheight="0px" marginwidth="0px" height="100%" width="100%"></iframe> -->
<img src= "<?php echo strip_tags($_REQUEST['og:image']);?>"/>

    </body>
</html>