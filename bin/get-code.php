#! /usr/bin/php
<?php

require_once dirname(__FILE__).'/../src/GoogleAuthenticator.php';

/**
 * Script calculates a Google Authenticator code 
 * and prints it to std out.
 * The first argument must be the location of a file containing the secret
 */

$secretFile = $argv[1];

// Check that file exists
if (is_null($secretFile)) {
    throw new \Exception("No secret file provided");
} else if (!is_file($secretFile)) {
    throw new \Exception("Invalid secret file: $secretFile");
}

// read the secret
$f = fopen($secretFile, 'r');
$secret = trim(fgets($f));
fclose($f);

$ga = new GoogleAuthenticator();

$token = $ga->getCode($secret);

echo "$token";
