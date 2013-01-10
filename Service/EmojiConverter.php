<?php

namespace Oh\EmojiBundle\Service;

require_once(__DIR__ . '/../vendor/emoji.php');

class EmojiConverter 
{

    public function iPhoneToHtml($sentence) {
        return emoji_unified_to_html(emoji_softbank_to_unified($sentence));
    }

    public function googleToHtml($sentence) {
        return emoji_unified_to_html(emoji_google_to_unified($sentence));
    }

}