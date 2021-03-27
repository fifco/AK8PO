<?php


namespace Conka\Secretary\Models;


interface CompletationInterface
{
    public const CREDIT = "credit";
    public const GRADED_CREDIT = "graded_credit";
    public const EXAM = "exam";

    public const ALLOWED_VALUES = [
        self::CREDIT,
        self::GRADED_CREDIT,
        self::EXAM,
    ];
}
