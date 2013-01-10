<?php

namespace Oh\EmojiBundle\Extension;

use Oh\EmojiBundle\Service\EmojiConverter;

class EmojiExtension extends \Twig_Extension 
{

    protected $converter;

    public function __construct(EmojiConverter $converter) {

        $this->converter = $converter;
    }

    public function getFilters() {
        return array(
            'iphone_emoji' => new \Twig_Filter_Method($this, 'iPhoneToHtml'),
            'google_emoji' => new \Twig_Filter_Method($this, 'googleToHtml'),
        );
    }

    public function iPhoneToHtml($sentence) {
        return $this->converter->iPhoneToHtml($sentence);
    }

    public function googleToHtml($sentence) {
        return $this->converter->googleToHtml($sentence);
    }

    public function getName() {
        return 'emoji';
    }

}