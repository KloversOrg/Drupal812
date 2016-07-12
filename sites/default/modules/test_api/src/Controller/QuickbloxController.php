<?php

namespace Drupal\test_api\Controller;

// Application credentials
DEFINE('APPLICATION_ID', 43284);
DEFINE('AUTH_KEY', "vM2DX7tkJm6x6Cg");
DEFINE('AUTH_SECRET', "4Zer7DAFGkPF6ZR");

// User credentials
DEFINE('USER_LOGIN', "android.somkid@gmail.com");
DEFINE('USER_PASSWORD', "058848391");

// Quickblox endpoints
DEFINE('QB_API_ENDPOINT', "https://api.quickblox.com");
DEFINE('QB_PATH_SESSION', "session.json");

class QuickbloxController {

    public static function QB_Session(){
        // Generate signature
        $nonce = rand();
        $timestamp = time(); // time() method must return current timestamp in UTC but seems like hi is return timestamp in current time zone
        $signature_string = "application_id=".APPLICATION_ID."&auth_key=".AUTH_KEY."&nonce=".$nonce."&timestamp=".$timestamp."&user[login]=".USER_LOGIN."&user[password]=".USER_PASSWORD;

        // echo "stringForSignature: " . $signature_string . "<br><br>";
        $signature = hash_hmac('sha1', $signature_string , AUTH_SECRET);

        // Build post body
        $post_body = http_build_query(array(
            'application_id' => APPLICATION_ID,
            'auth_key' => AUTH_KEY,
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'signature' => $signature,
            'user[login]' => USER_LOGIN,
            'user[password]' => USER_PASSWORD
        ));

// $post_body = "application_id=" . APPLICATION_ID . "&auth_key=" . AUTH_KEY . "&timestamp=" . $timestamp . "&nonce=" . $nonce . "&signature=" . $signature . "&user[login]=" . USER_LOGIN . "&user[password]=" . USER_PASSWORD;

        // echo "postBody: " . $post_body . "<br><br>";
// Configure cURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, QB_API_ENDPOINT . '/' . QB_PATH_SESSION); // Full path is - https://api.quickblox.com/session.json
        curl_setopt($curl, CURLOPT_POST, true); // Use POST
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_body); // Setup post body
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Receive server response

// Execute request and read responce
        $responce = curl_exec($curl);

// Check errors
        if ($responce) {
            return $responce ;
        } else {
            $error = curl_error($curl). '(' .curl_errno($curl). ')';
            return  $error;
        }

// Close connection
        curl_close($curl);
    }

    public static function QB_Login(){
/*
 curl -X GET \
-H "QuickBlox-REST-API-Version: 0.1.0" \
-H "QB-Token: d4f8f403b9a9d665afeef16cb4260d88151a11c1" \
http://api.quickblox.com/users/by_login.json?login=Lena
 */

    }

    public static function QB_Register(){
        /*
        curl -X POST \
-H "Content-Type: application/json" \
-H "QuickBlox-REST-API-Version: 0.1.0" \
-H "QB-Token: d4f8f403b9a9d665afeef16cb4260d88151a11c1" \
-d '{"user": {"login": "Lena", "password": "Lena123456", "email": "lena@domain.com", "external_user_id": "", "facebook_id": "", "twitter_id": "", "full_name": "Lena Laktionova", "phone": "", "website": "", "tag_list": ""}}' \
http://api.quickblox.com/users.json
         */
    }

    public static function QB_DeleteUser(){
        /*
curl -X DELETE \
-H "QuickBlox-REST-API-Version: 0.1.0" \
-H "QB-Token: d4f8f403b9a9d665afeef16cb4260d88151a11c1" \
http://api.quickblox.com/users/14959846.json
         */
    }
}