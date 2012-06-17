<?php

namespace Oh\EmojiBundle\Extension;

require_once(__DIR__.'/../vendor/emoji.php');

class EmojiExtension extends \Twig_Extension {

    public function getFilters() {
        return array(
            'iphone_emoji'   => new \Twig_Filter_Method($this, 'iPhoneToHtml'),
            'google_emoji'   => new \Twig_Filter_Method($this, 'googleToHtml'),
        );
    }
	
	public function iPhoneToHtml($sentence) {
		return emoji_unified_to_html(emoji_softbank_to_unified($sentence));
	}
	
	public function googleToHtml($sentence) {
		return emoji_unified_to_html(emoji_google_to_unified($sentence));
	}
	
    public function getName()
    {
        return 'emoji';
    }

}