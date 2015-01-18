Google Authenticator PHP class
=====================

* Copyright (c) 2012, [http://www.phpgangsta.de](http://www.phpgangsta.de)
* Author: Michael Kliewe, [@PHPGangsta](http://twitter.com/PHPGangsta)
* Licensed under the BSD License.

[![Build Status](https://travis-ci.org/PHPGangsta/GoogleAuthenticator.png?branch=master)](https://travis-ci.org/PHPGangsta/GoogleAuthenticator)

This PHP class can be used to interact with the Google Authenticator mobile app for 2-factor-authentication. This class
can generate secrets, generate codes, validate codes and present a QR-Code for scanning the secret.

For a secret installation you have to make sure that used codes cannot be reused (replay-attack).

Usage:
------

See example files

    php example1.php
    Secret is: OQB6ZZGYHCPSX4AK

    Google Charts URL for the QR-Code: https://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth://totp/infoATphpgangsta.de%3Fsecret%3DOQB6ZZGYHCPSX4AK

    Checking Code '848634' and Secret 'OQB6ZZGYHCPSX4AK':
    OK

Usage: bin/get-code.php 
-----------------------

If you use 2-factor-auth for ssh'ing into servers, you know it can be 
cumbersome copying codes from your mobile app to your terminal. 
This script quickly calculates and prints your code. Simply put your 2FA 
secret in a file, e.g. '~/.google_authenticator', then run the following command:

    $ bin/get-code.php ~./google_authenticator

To be able to execute the command anywhere, make a symlink in one of your $PATH directories to the script:

    $ ln -s /foo/bar/GoogleAuthenticator/bin/get-code.php ~/bin/get-code

Since most likely you don't need to see the code, but rather copy it, 
take things a step further and make a bash alias which pipes the output
directly into the clipboard. On OSX pbcopy can be used, on linux xsel 
will do the trick.

OSX example (put the following in ~/.bash_profile:

    alias getcode="get-code ~/.google_authenticator | pbcopy"


ToDo:
-----
- ??? What do you need?

Notes:
------
If you like this script or have some features to add: contact me, visit my blog, fork this project, send pull requests, you know how it works.
