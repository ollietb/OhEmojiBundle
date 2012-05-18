OhEmojiBundle
=============

Uses [php-emoji](https://github.com/iamcal/php-emoji) to create a Twig extension that converts iPhone emoji icons to html.

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

>imports:
>    - { resource: parameters.ini }
>    - { resource: security.yml }
>    - { resource: @OhInstagramBundle/Resources/config/services.yml }
>    - { resource: @OhEmojiBundle/Resources/config/services.yml }


finally publish the assets

    php app/console assets:install --symlink web

and include the css in your stylesheets

    <link rel="stylesheet" href="{{asset('css/emoji.css')}}">

Usage (Twig)
------------

### iphone_emoji

Simple function to display wrap spans around your emoji characters.

	{{ "This text contains some emoji !" | iphone_emoji }}

Would output

	<span class="emoji emoji1f4f1"></span>

There's also a Google_emoji function

Tests
-------

Not needed - this is just a Symfony2 wrapper for another library which has it's own tests https://github.com/iamcal/php-emoji

Credits
-------

* Ollie Harridge (ollietb) as main author.
* Cal Henderson (iamcal) for writing the converter script [https://github.com/iamcal/php-emoji]