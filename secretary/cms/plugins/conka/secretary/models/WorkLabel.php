<?php namespace Conka\Secretary\Models;


use October\Rain\Database\Model;
use October\Rain\Database\Traits\Validation;

class WorkLabel extends Model
{
    use Validation;

    public $table = 'conka_secretary_work_labels';

    protected $guarded = ['*'];

    protected $fillable = [
        'type',
        'student_count',
        'subject_id',
        'study_group_id',
        'employee_id',
        'subject_id',
        'study_group_id',
        'employee_id',
    ];

    public array $rules = [];

    protected $casts = [
        'student_count' => 'integer',
    ];

    protected $jsonable = [];

    protected $appends = [
        'hours',
        'weeks',
        'points',
    ];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'employee' => [Employee::class, 'key' => 'employee_id'],
        'subject' => Subject::class,
        'study_group' => [StudyGroup::class, 'key' => 'study_group_id'],
    ];

    public function getHoursAttribute()
    {
        if (!$this->subject) {
            return 0;
        }

        if ($this->type === WorkLabelTypeInterface::LECTURE) {
            return $this->subject->lecture_hours;
        }

        if ($this->type === WorkLabelTypeInterface::SEMINAR) {
            return $this->subject->seminar_hours;
        }

        if ($this->type === WorkLabelTypeInterface::EXERCISE) {
            return $this->subject->exercise_hours;
        }

        return 0;
    }

    public function getWeeksAttribute()
    {
        if (!$this->subject) {
            return 0;
        }

        return $this->subject->weeks;
    }

    public function getPointsAttribute()
    {
        if (in_array($this->type, [
            WorkLabelTypeInterface::LECTURE,
            WorkLabelTypeInterface::SEMINAR,
            WorkLabelTypeInterface::EXERCISE
        ], true)) {
            $factor = $this->getHoursAttribute() * $this->getWeeksAttribute();
        } else {
            $factor = $this->subject->study_groups()->sum('students_count');
        }

        return $factor * config('weights')[$this->subject->language][$this->type];
    }

    public function getTypeOptions()
    {
        return WorkLabelTypeInterface::OPTIONS;
    }
}
