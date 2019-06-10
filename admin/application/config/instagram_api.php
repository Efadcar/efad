<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'Itcan';//Your App Name
$config['instagram_client_id']		= '39b27bde100347e9b1f9141bec47327c';//Your Client ID
$config['instagram_client_secret']	= '28e120c719ce48c28467a5180a3f715d';//Your Secret Key
$config['instagram_callback_url']	= 'http://app.links.bio/admin/authorize/get_code/';//e.g. http://yourwebsite.com/authorize/get_code/
$config['instagram_website']		= 'http://app.links.bio/admin/';//e.g. http://yourwebsite.com/
$config['instagram_description']	= 'This application will get the news feed for clients';//Your App Description
	
/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = 'basic+likes+comments+relationships+follower_list+public_content';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 

$config['instagram_ssl_verify']		= FALSE;
