<?php define("REAL_PASSWORD","root");

$validPassword = false;

if(!isset($_POST['password']) || $_POST['password'] == ''){
	$mail = '<div style="color:blue">Ayye bruh, you need a password to use this...</div>';
	$validPassword = false;
}elseif($_POST['password'] != REAL_PASSWORD){
	$mail = '<div style="color:red">Invalid password.</div>';
	$validPassword = false;
}else{
	$validPassword = true;
}

if(isset($_POST['to']) && isset($_POST['from']) && isset($_POST['fromname']) && isset($_POST['replyto']) && isset($_POST['subject']) && isset($_POST['message']) && $validPassword){

	$headers = 'From: '.$_POST['fromname'].' <'.$_POST['from'].'>' . "\r\n" .
	    'Reply-To: '. $_POST['replyto'] . "\r\n";

	$mail = mail($_POST['to'],$_POST['subject'],$_POST['message'],$headers);
	
	if($mail){ $mail = '<div style="color:green">Mail sent.</div>'; }
	else{ $mail = '<div style="color:red">Error</div>'; }
	
}else{
	if(!isset($mail)){ $mail = '<div style="color:red">Fill in all inputs</div>'; }
}
?>
<!DOCTYPE html>
<html>
	<head><title>Email Sender</title></head>
	<body>
		<?php echo($mail); ?>
		<form action="index.php" method="post">
			<table border="0">
				<tr>
				  <tr><td><input type="text" name="to" placeHolder="Clients e-mail "></td></tr>
				  <tr><td><input type="text" name="from" placeHolder="Spoofer e-mail"></td></tr>
				  <tr><td><input type="text" name="fromname" placeHolder="Name"></td></tr>
				  <tr><td><input type="text" name="replyto" placeHolder="Reply "></td></tr>
				  <tr><td><input type="text" name="subject" placeHolder="Subject "></td></tr>
				  <tr><td><textarea name="message" placeHolder="write msg here"></textarea></td></tr>
				  <tr><td><input type="password" name="password" placeHolder="secretpwd"></td></tr>
				  <tr><td colspan="2"><input type="submit" value="Send Email" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>
