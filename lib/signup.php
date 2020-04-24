<?php
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}

function sendMail($email, $token, $username){
	$to      = $email;
	$subject = 'Activate your account';

	$message = '';
	$message .= 'Please click this https://webdyno.net/activate?token='.$token.' to activate your account';
	$message .= '</span>';
	$message .= '</html></body>';

	$headers = 'From: office@webdyno.net' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
}

if (isset($_POST['fullname'])) {
	require_once 'dbcon.php';

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashpass = password_hash($password, PASSWORD_DEFAULT);

	$sql = "SELECT * FROM `tbl_users` WHERE name = '{$_POST['username']}' OR email = '{$_POST['email']}'";
	$result = $conn->query($sql);
	$num_row = $result->num_rows;

	if ($num_row > 0) {
		echo "user alredy exists";
	}else{

		$sql = "INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `username`) VALUES (NULL, '{$fullname}', '{$email}', '{$hashpass}', '{$username}')";

		if ($conn->query($sql) === TRUE) {
			//echo "User registraion successful. please see your email to activate your account";
			echo "User registraion successful.";
			
			$token = getToken(22);
			$type = 'client';
			$last_id = $conn->insert_id;

			$conn->query("INSERT INTO `tbl_user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, {$last_id}, 'type', '{$type}')");
			$conn->query("INSERT INTO `tbl_user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, {$last_id}, 'token', '{$token}')");

			//sendMail($email, $token, $username);

		}else{
			echo "!!error";
		}
	}
}
