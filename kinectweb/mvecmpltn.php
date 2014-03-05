<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
	<script type='text/javascript' src='js/jquery.js'></script>
    <title>Update Kinect Data</title>
	</head>
	<script type="text/javascript">
    $(document).ready(function(){    
    $('#addContent').click(function(){
   $("#maincontent").load("updateparents.php");
   return false;
});
});
</script>
	 
  <body>
    <h1>Update once move is validated</h1>
	<div id="just">
	<a href="#" id="addContent">Open File</a>
    <div id="maincontent"></div>
	</div>
	</body>
</html>