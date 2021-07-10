<?php namespace Conka\Secretary\Models;


use Conka\Secretary\Services\GenerateWorkLabels;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Validation;

class StudyGroup extends Model
{
    use Validation;

    public $table = 'conka_secretary_study_groups';

    protected $guarded = ['*'];

    protected $fillable = [
        'abbr',
        'title',
        'form',
        'term',
        'type',
        'year',
        'students_count',
        'language',
    ];

    public array $rules = [];

    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'students_count' => 'integer',
    ];

    protected $jsonable = [];

    protected $appends = [];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'work_labels' => WorkLabel::class
    ];

    public $belongsToMany = [
        'subjects' => [Subject::class, 'table' => 'conka_secretary_study_group_subject']
    ];

    public function getFormOptions()
    {
        return StudyGroupFormInterface::OPTIONS;
    }

    public function getTermOptions()
    {
        return StudyGroupTermInterface::OPTIONS;
    }

    public function getTypeOptions()
    {
        return StudyGroupTypeInterface::OPTIONS;
    }

    public function getLanguageOptions()
    {
        return LanguageInterface::OPTIONS;
    }

    public function afterSave()
    {
        $service = app()->make(GenerateWorkLabels::class);
        $service->generate();
    }
}
