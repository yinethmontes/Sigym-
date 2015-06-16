== CAPTCHA ini 5 lines of PHP ==

Ok, here is a quick readme:

TODO:
1. Create a new folder for the CAPTCHA images to be saved to
2. CHMOD this directory 777, (Directory permissions 777).
3. Add the following lines of code to the top of the form page you wish to show the Captcha on:
	<?php
		require_once('captcha.class.php');
		$captcha = new Captcha;
		$captchaImage = $captcha->create();
	?>
	
4. Inside your <form> add the following file of code wherever you would like the Captcha displayed, usually just above the submit button:
	<?= $captchaImage; ?>

5. At the top of the page that you are processing the user input add:
	<?php
		require_once('captcha.class.php');
		$captcha = new Captcha;
	?> 

6. Now in the page that you are processing the form, add the following lines, i am assuming that you are checking atleast 1 of the values the user inputs.
	$verified = $captcha->verify($_POST[$captcha->captchaInputName]);
	
7. This would fit into your processing IF statement like so:
	if($verified) {
		// The captcha was correct!
	} else {
		// ERROR - the user did not complete the captcha successfully.
	}

7. You will now need to customise some variables in the captcha.class.php file, here is an explaniation of them.
The 2 variables that you NEED to change are the '$imageDirectory' and '$imageURL'.

Explaination of these variables
$imageDirectory: This is the path to the directory that the images will be creates, this needs writable permissions: chmod 777.
$imageURL: This is the URL to the images directory so we can output them to the users.
$captchaLabel: This is what is displayed above the Captcha telling the user what this is for.
$captchaBoxStyle: This is the style of the captcha box.


I hope this helps combat those Comment Spammers!
Please dont forget to reference nodstrum.com if you use this :)

Jamie McConnell and Nodstrum.com can/will not be held responsible for any problems that occur after installing and using this script.