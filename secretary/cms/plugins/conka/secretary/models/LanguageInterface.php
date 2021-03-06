<?php


namespace Conka\Secretary\Models;


interface LanguageInterface
{
    public const CS = "cs";
    public const EN = "en";

    public const ALLOWED_LANGUAGES = [
        self::CS,
        self::EN,
    ];

    public const OPTIONS = [
        self::CS => 'Czech',
        self::EN => 'English',
    ];
}
