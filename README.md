# Google Authenticator in PHP

This PHP class, created by Michael Kliewe [@PHPGangsta](http://twitter.com/PHPGangsta),
can be used to interact with Google Authenticator.

Example Usage:

```php
<?php

$ga = new GoogleAuthenticator();

$secret = $ga->createSecret();
echo "Secret is: ".$secret."\n\n";

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";

$code = $ga->getCode($secret);
echo "Checking Code '$oneCode' and Secret '$secret':\n";

$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
    echo 'OK';
} else {
    echo 'FAILED';
}
```

## get-code Executable

This script is useful for developers who use 2-factor-auth for signing
into servers. Rather than copying codes from your mobile phone app, you can 
execute a quick command in the terminal to get the current code.

Simply put your 2FA secret in a file, e.g. '~/.google_authenticator', then run the following command:

```
$ /path/to/GoogleAuthenticator/bin/get-code.php ~./google_authenticator
> 102986
```

For an even more convenient setup:

1.  Make a symlink in one of your $PATH directories to the script so you can execute it anywhere:

```
$ ln -s /path/to/GoogleAuthenticator/bin/get-code.php ~/bin/get-code
```

2. Make a bash alias which pipes the output directly into the clipboard:

```
# ~./bash_profile

alias getcode="get-code ~/.google_authenticator | pbcopy"
```

Now just run `getcode` and the current 2FA code will be in your clipboard.

**Note:** `pbcopy` is on OSX only. I believe on linux `xsel` will do the trick.

