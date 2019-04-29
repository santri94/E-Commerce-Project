<?php
    
    #-------------------------------------------------------------------------------
	# Image Logo : http://www.pngmart.com/image/19530
	# Images: https://www.advisian.com/en/case-studies/kai-tak-multi-purpose-sports-complex
	# https://teezoning.com/foolball
	# https://fantatennisprotour.forumfree.it/?f=64733008
	# https://www.easycredit.de/easycredit-bbl
	# https://ultimatesportgyms.com/buy-batting-cages-nets-frames-softball-training-aids-accessories/baseball-bg-batting-cage-nets
    #-------------------------------------------------------------------------------

    $msg = "You must login to view this site.";
    if (isset($_GET['error'])==true) {
        # code...
        $msg = "Error: Password and Email do not Match";
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="ChangeImage.js"></script>
	
</head>
<body onload=set_time() >
	<div class="top">
		<table align="center">
			<tr>
				<td align="center" width="400"><img src="Images/logo.png" width="350" height="100"></td>
				<td width="800" align="center" >
					<h1>Sports Supply</h1>
				</td>	
				<td >
					 <h2>Phone: (555)555-5555</h2> 
					 <h2>Adress: 2 Central Ave, New Jersey.</h2>
				</td>
			</tr>
			
		</table>
		
		</div>

		<form action="Validate.php" method="post">
			<p  align="right">
			<input class="frontpage" type="email" name="Email" placeholder="name@gmail.com" required>
			<input class="frontpage" type="password" name="pass" required>
			<input class="button" type="submit" value="Login">
			<a href="Register.php"><button class="register" type="button">Register</button></a>
			</p>

			



		</form>

		<div align="center" id="image-data">
			<img class="bg" src="Images/bg1.jpg" alt="Background" id="data">

		</div>

		<p class="error"><?php echo $msg; ?></p>


</body>
</html>