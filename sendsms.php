<?php
//include config file
include_once("config.php");
//get account balance
$apix_acct_balance_url = API_URL."?cmd=balance&token=".API_TOKEN;

$main_acct_balance_url = API_URL."?cmd=balance&username=".USERNAME."&password=".PASSWORD;

if (!$getbalance = file_get_contents($main_acct_balance_url)) {
	$getbalance = "Unavailable";
}
//end get account balance
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>OrgDS SMS API Form</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
   <form method="post" action="<?= API_URL ?>">
		<h2>OrgDS.org</h2>
		<hr>
      <p><strong>Balance</strong> : <?= $getbalance; ?></p>
      <p><strong>Sender</strong> : <em style="font-size: 90%;">(Max length: <b>11</b>)</em><br />
         <input type="text"  placeholder="Sender ID" name="senderid" maxlength="11" />
      <p><strong>Recipient(s)</strong> : <em style="font-size: 90%;">(ex: 234803..., 234802..., 447032...)</em><br />
         <textarea rows="4" cols="21" placeholder="Comma-separated recipient list" name="recipients"></textarea>
      <p><strong>Message</strong> :<br />
         <textarea placeholder="Type message here" name="message" rows="5" cols="21" ></textarea></p>
		<p><strong>Send message via</strong> :<br>
			<input type="radio" name="route" checked="checked" required="required" value="2" /> Basic Route<br>
			<input type="radio" name="route" required="required" value="4" /> Corporate Route
		</p>
		<p>
			<strong>Message type </strong> :
			<br><input type="radio" name="type" required="required" value="0" checked="checked" /> Plain Text<br>
			<input type="radio" name="type" required="required" value="1" /> Flash Message
		</p>
         <input type="hidden" name="cmd" value="send" />
         <input type="hidden" name="username" value="<?= USERNAME ?>" />
         <input type="hidden" name="password" value="<?= PASSWORD ?>" />
         <!-- <input type="hidden" name="token" value="<?= API_TOKEN ?>" /> --> <!-- uncomment if using APIX TOKEN -->
         <input type="submit" value="Send" />
   </form>
</body>

</html>