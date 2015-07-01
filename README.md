OhEmojiBundle
=============

Symfony2 bundle which uses [php-emoji](https://github.com/iamcal/php-emoji) to create a Twig extension that converts iPhone emoji icons to html.

Installation
------------

Install this bundle as usual by adding to deps:

	// /deps
	[OhEmojiBundle]
	   git=https://github.com/ollietb/OhEmojiBundle
	   target=/bundles/Oh/EmojiBundle

and running the vendors script

    php bin/vendors install

Register the namespace in `app/autoload.php`:

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Oh' => __DIR__.'/../vendor/bundles',
    ));

Register the bundle in `app/AppKernel.php`:

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Oh\EmojiBundle\OhEmojiBundle(),
        );
    }

Add the following line to `app/config/config.yml`:

	imports:
		- { resource: @OhEmojiBundle/Resources/config/services.yml }


finally publish the assets

    php app/console assets:install --symlink web

and include the css in your stylesheets

    <link rel="stylesheet" href="{{asset('bundles/ohemoji/css/emoji.css')}}">

Usage (Twig)
------------

### iphone_emoji

Simply use the function to automatically wrap spans around your emoji characters.

	{{ "This text contains some emoji !" | iphone_emoji }}

Would output

	This text contains some emoji <span class="emoji emoji1f4f1"></span>!

There's also a `google_emoji` function, because for some reason they use different standards.

Tests
-------

Not needed - this is just a Symfony2 wrapper for another library which has its own tests https://github.com/iamcal/php-emoji

Credits
-------

* Ollie Harridge (ollietb) as main author.
* Cal Henderson (iamcal) for writing the converter script [https://github.com/iamcal/php-emoji]