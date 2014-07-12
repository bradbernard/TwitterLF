<?php

// You can find the keys here : https://dev.twitter.com/

return array(
	'API_URL'             => 'api.twitter.com',
	'API_VERSION'         => '1.1',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => $_ENV['CONSUMER_KEY'],
	'CONSUMER_SECRET'     => $_ENV['CONSUMER_SECRET'],
	'ACCESS_TOKEN'        => $_ENV['ACCESS_TOKEN'],
	'ACCESS_TOKEN_SECRET' => $_ENV['ACCESS_TOKEN_SECRET'],
);
