<?php

if (!function_exists('countCharsLangInStr')) {
    function countCharsLangInStr($str, $lang = 'ru')
    {
        $languages = ['ru' => 'а-яё', 'en' => 'a-z'];

        if (empty($languages[$lang]) && empty($str)) {
            return false;
        }

        preg_match_all('/[' . $languages[$lang] . ']/ui', $str, $matches);

        return count($matches[0]);
    }
}

if (!function_exists('detectLangAndReplace')) {
    function detectLangAndReplace($ruChars, $enChars, $str): array
    {
        $languages = ['ru' => 'а-яё', 'en' => 'a-z'];

        $currentLang = ($ruChars >= $enChars ? 'en' : 'ru');

        $text = preg_replace('/([' . $languages[$currentLang] . '])/ui', '<strong>\1</strong>', $str);

        return ['lang' => $ruChars >= $enChars ? 'ru' : 'eu', 'text' => $text];
    }

}
