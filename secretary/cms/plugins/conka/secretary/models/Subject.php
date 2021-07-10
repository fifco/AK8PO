<?php namespace Conka\Secretary\Models;


use Conka\Secretary\Services\GenerateWorkLabels;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Validation;

class Subject extends Model
{
    use Validation;

    public $table = 'conka_secretary_subjects';

    protected $guarded = ['*'];

    protected $fillable = [
        'abbr',
        'title',
        'credits',
        'department',
        'garant_id',
        'lecture_hours',
        'seminar_hours',
        'exercise_hours',
        'weeks',
        'language',
        'completation',
        'group_size',
    ];

    public array $rules = [];

    protected $casts = [
        'credits' => 'integer',
        'garant_id' => 'integer',
        'lecture_hours' => 'integer',
        'seminar_hours' => 'integer',
        'exercise_hours' => 'integer',
        'weeks' => 'integer',
        'group_size' => 'integer',
    ];

    protected $jsonable = [];

    protected $appends = [];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'work_labels' => WorkLabel::class,
    ];

    public $belongsTo = [
        'garant' => Employee::class,
    ];

    public $belongsToMany = [
        'study_groups' => [ StudyGroup::class , 'table' => 'conka_secretary_study_group_subject' ],
    ];

    public function getLanguageOptions()
    {
        return LanguageInterface::OPTIONS;
    }

    public function getCompletationOptions()
    {
        return CompletationInterface::OPTIONS;
    }

    public function afterSave()
    {
        $service = app()->make(GenerateWorkLabels::class);
        $service->generate();
    }
}
