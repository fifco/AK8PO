<?php


namespace Conka\Secretary\Models;


interface StudyGroupFormInterface
{
    public const FULL_TIME = 'full-time';
    public const PART_TIME = 'part-time';

    public const ALLOWED_VALUES = [
        self::FULL_TIME,
        self::PART_TIME,
    ];

    public const OPTIONS = [
        self::FULL_TIME => 'Full Time Study',
        self::PART_TIME => 'Part Time Study',
    ];
}
