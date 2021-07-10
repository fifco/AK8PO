<?php

use Conka\Secretary\Models\LanguageInterface;
use Conka\Secretary\Models\WorkLabelTypeInterface;

return [
    LanguageInterface::CS => [
        WorkLabelTypeInterface::LECTURE => 1.8,
        WorkLabelTypeInterface::EXERCISE => 1.2,
        WorkLabelTypeInterface::SEMINAR => 1.2,

        WorkLabelTypeInterface::CREDIT => 0.2,
        WorkLabelTypeInterface::GRADED_CREDIT => 0.3,
        WorkLabelTypeInterface::EXAM => 0.4,
    ],
    LanguageInterface::EN => [
        WorkLabelTypeInterface::LECTURE => 2.4,
        WorkLabelTypeInterface::EXERCISE => 1.8,
        WorkLabelTypeInterface::SEMINAR => 1.8,

        WorkLabelTypeInterface::CREDIT => 0.2,
        WorkLabelTypeInterface::GRADED_CREDIT => 0.3,
        WorkLabelTypeInterface::EXAM => 0.4,
    ]
];
