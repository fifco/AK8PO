<?php


namespace Conka\Secretary\Models;


interface WorkLabelTypeInterface
{
    public const LECTURE = 'lecture';
    public const SEMINAR = 'seminar';
    public const EXERCISE = 'exercise';
    public const EXAM = 'exam';
    public const CREDIT = 'credit';
    public const GRADED_CREDIT = 'graded_credit';

    public const ALLOWED_VALUES = [
        self::LECTURE,
        self::SEMINAR,
        self::EXERCISE,
        self::EXAM,
        self::CREDIT,
        self::GRADED_CREDIT,
    ];

    public const OPTIONS = [
        self::LECTURE => 'Lecture',
        self::SEMINAR => 'Seminar',
        self::EXERCISE => 'Exercise',
        self::EXAM => 'Exam',
        self::CREDIT => 'Credit',
        self::GRADED_CREDIT => 'Graded Credit',
    ];
}
