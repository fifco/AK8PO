<?php

namespace Conka\Secretary\Services;

use Conka\Secretary\Models\StudyGroup;
use Conka\Secretary\Models\Subject;
use Conka\Secretary\Models\WorkLabel;
use Conka\Secretary\Models\WorkLabelTypeInterface;

class GenerateWorkLabels
{
    private Subject $subject;

    private StudyGroup $group;

    public function generate()
    {
        $groups = StudyGroup::all();

        foreach ($groups as $group) {
            $this->group = $group;
            $subjects = $this->group->subjects;

            foreach ($subjects as $subject) {
                $this->subject = $subject;

                if ($this->subject->lecture_hours > 0) {
                    $this->generateLecture();
                }

                if ($subject->seminar_hours > 0) {
                    $this->generatePracticalTeching(WorkLabelTypeInterface::SEMINAR);
                }

                if ($subject->exercise_hours > 0) {
                    $this->generatePracticalTeching(WorkLabelTypeInterface::EXERCISE);
                }

                $this->generateCompletation();
            }
        }
    }

    private function generateLecture()
    {
        $workLabel = WorkLabel::firstOrCreate([
            'type' => WorkLabelTypeInterface::LECTURE,
            'subject_id' => $this->subject->id,
            'study_group_id' => $this->group->id
        ]);

        $workLabel->student_count = $this->group->students_count;
        $workLabel->save();
    }

    private function generateCompletation()
    {
        $workLabel = WorkLabel::firstOrCreate([
            'type' => $this->subject->completation,
            'subject_id' => $this->subject->id,
            'study_group_id' => $this->group->id
        ]);

        $workLabel->student_count = $this->group->students_count;
        $workLabel->save();
    }

    private function generatePracticalTeching($type)
    {
        $studentsLeftToAssign = $this->group->students_count;

        $workLabels = WorkLabel::where('type', $type)
            ->where('subject_id', $this->subject->id)
            ->where('study_group_id', $this->group->id)->get();

        foreach ($workLabels as $workLabel) {
            $workLabel->student_count = min(max(0, $studentsLeftToAssign), $this->subject->group_size);
            $workLabel->save();

            $studentsLeftToAssign -= $this->subject->group_size;
        }

        while($studentsLeftToAssign > 0) {
            WorkLabel::create([
                'type' => $type,
                'student_count' => min($studentsLeftToAssign, $this->subject->group_size),
                'subject_id' => $this->subject->id,
                'study_group_id' => $this->group->id
            ]);

            $studentsLeftToAssign -= $this->subject->group_size;
        }
    }
}
