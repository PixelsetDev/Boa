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

    /**
     * @param $LanguageFile string The language file to use.
     */
    public function __construct(string $LanguageFile)
    {
        if ($LanguageFile != null) {
            $this->LanguageFile = $LanguageFile;
        } else {
            echo 'Language file not passed to Translation class';
            exit;
        }
    }

    /**
     * @param string $key The key to translate.
     * @return string The translated string.
     */
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

    /**
     * Runs one-off translations (not recommended if you're translating multiple strings).
     * @param string $LanguageFile The language file to use.
     * @param string $key The key to translate.
     * @return string The translated string.
     */
    public function DoTranslation(string $LanguageFile, string $key): string
    {
        $LanguageJSON = json_decode($LanguageFile);

        return $LanguageJSON->$key ?? $key ?? 'Unknown';
    }
}