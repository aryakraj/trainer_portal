<!DOCTYPE html>
<html>
<head>
	<title>Email Sending</title>
</head>
<body>
	<form action="<?php echo base_url() ?>main/send" method="post">
	<h1>Welcome To Email Page</h1>
	<h3>Send Mail Here!!!</h3>
		To:&nbsp;&nbsp;&nbsp;<input type="email" name="from" placeholder="Enter Valid Email"><br><br><br>
		
		Content:&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="message" placeholder="Sending message Here" style="width:500px; height: 100px;"></textarea>
		<button type="submit" name="submit" value="submit">Send Mail</button>
	</form>
</body>
</html>