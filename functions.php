<?php

function alias(string $value, string $separator = '-') {
    $transliterate = transliterate(mb_strtolower($value));
    return str_replace(" ", $separator, $transliterate);
}

function transliterate(string $value) {
    return str_replace(getCyrillic(), getLatin(), trim($value));
}

function getLatin()
{
    return [
        'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
        'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya'
    ];
}

function getCyrillic()
{
    return [
        'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
        'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я'
    ];
}