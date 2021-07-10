<?php


namespace Conka\Secretary\Models;


interface StudyGroupTypeInterface
{
    public const BACHELOR = 'bachelor';
    public const MASTER = 'master';

    public const ALLOWED_VALUES = [
        self::BACHELOR,
        self::MASTER,
    ];

    public const OPTIONS = [
        self::BACHELOR => "Bachelor Degree",
        self::MASTER => "Master Degree",
    ];
}
