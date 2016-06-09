<?php
/*
This is a Slack /slashcommand that connects to the Genius.com API.
It requires the user to enter the name of the artist and the song name.
If the user only enters an artist's name it may not return the correct result. 

This script is based on Is It Up for Slack: https://github.com/mccreath/istiupforslack; mccreath@gmail.com

*/

$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];

# Check the token and make sure the request is from our team 
if($token != 'L88Sl3s0SHi0xdgeXp2mT4gP'){ 
  $msg = ":squirrel: The token for the slash command doesn't match. We're done here until IT fixes it. Don't worry, Squirrelock is on the case.";
  die($msg);
  echo $msg;
}

#this variable sets up what we'll be sending to Genius.com
$genius_check = "https://api.genius.com/search?access_token=BAkkm2GLcTlWh1g1DPYjBBCo9MVlkRDIYnqGI_V8R_EL5AcHtxr6rwdrOdVwP46N&q=".urlencode($text);

# Let's set up cURL to do something that I hope will work
$ch = curl_init($genius_check);

##Let's get the value back from our query
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#Make the call and get the response
$ch_response = curl_exec($ch);
# Close the connection 
curl_close($ch);

#Let's hope this works. We want to decode the gigantic JSON arry sent back by Genius.com
$response_array = json_decode($ch_response, true);

if ($ch_response === FALSE){

	#Genius.com couldn't be reached or the request failed.
	$reply = ":squirrel: There's a problem reaching Genius.com. Squirrelock is on the case!";

} else { 
	#send back the requested URL
	$reply = ":pipboy: Here you go! *<".$response_array["response"]['hits'][0]['result']['url'].">*";
	}

#Let's deliver our information back to the user
echo $reply;







