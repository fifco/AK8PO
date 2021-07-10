<?php


namespace Conka\Secretary\Models;


interface StudyGroupTermInterface
{
    public const SPRING = 'spring';
    public const AUTUMN = 'autumn';

    public const ALLOWED_VALUES = [
        self::SPRING,
        self::AUTUMN,
    ];

    public const OPTIONS = [
        self::SPRING => 'Spring Term',
        self::AUTUMN => 'Autumn Term',
    ];
}
