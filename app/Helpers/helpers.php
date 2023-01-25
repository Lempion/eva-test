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
        $languagesForExcept = ['en' => 'а-яё', 'ru' => 'a-z'];

        $currentLang = ($ruChars >= $enChars ? 'ru' : 'en');

        $text = preg_replace('/([' . $languagesForExcept[$currentLang] . '])/ui', '<strong>\1</strong>', $str);

        return ['lang' => $currentLang, 'text' => $text];
    }

}
