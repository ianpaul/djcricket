djcricket is written in PHP and is a Slack /slashcommand that retrieves a URL from the Genius.com API. 

If you are going to use this code you will need a server running PHP and cURL (at this writing curl was php5-curl).

The /slashcommand requires the user to enter the name of the artist and the song name.

If the user only enters an artist's name it will return whatever Genius offers as the first search result. 

This script is based on David McCreath's [Is It Up for Slack](: https://github.com/mccreath/isitup-for-slack). With additional inspiration from [Andrew Mager](https://mager.co/how-to-write-a-slackbot-in-40-lines-of-code-52cf0c4fcf42).
