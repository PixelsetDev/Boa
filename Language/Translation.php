<?php

/**
 * Boa Language - Translation.
 *
 * Translates text using a prebuilt file.
 */

namespace Boa\Language;

class Translation
{

    private string $LanguageFile;

    public function __construct($LanguageFile = null)
    {
        if ($LanguageFile != null) {
            $this->LanguageFile = $LanguageFile;
        } else {
            echo 'Language file not passed to Translation class';
            exit;
        }
    }

    public function Translate(string $key): string
    {
        if (file_exists($this->LanguageFile)) {
            $LanguageFile = file_get_contents($this->LanguageFile);

            return $this->DoTranslation($LanguageFile, $key);
        } else {
            echo 'Language file not found at '.$this->LanguageFile;
            exit;
        }
    }

    public function DoTranslation(string $LanguageFile, string $key)
    {
        $LanguageJSON = json_decode($LanguageFile);

        return $LanguageJSON->$key ?? $key ?? 'Unknown';
    }
}