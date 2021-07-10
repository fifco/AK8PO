<?php namespace Conka\Secretary\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use October\Rain\Database\Builder;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Validation;

class Employee extends Model
{
    use Validation;

    public $table = 'conka_secretary_employees';

    protected $guarded = ['*'];

    protected $fillable = [
        'name',
        'surname',
        'work_phone',
        'secondary_phone',
        'work_email',
        'secondary_email',
        'is_in_phd_study',
        'employment_ratio',
    ];

    public array $rules = [];

    protected $casts = [
        'is_in_phd_study' => 'boolean',
        'employment_ratio' => 'integer',
    ];

    protected $jsonable = [];

    protected $appends = [
        'full_name',
        'work_points',
        'work_points_without_eng',
    ];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'subjects' => [
            Subject::class, 'key' => 'garant_id'
        ],
        'work_labels' => [
            WorkLabel::class, 'key' => 'employee_id'
        ]
    ];

    public function getFullNameAttribute($value)
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getMaximumWorkPointsAttribute($value)
    {
        return 10 * $this->employment_ratio;
    }

    public function getWorkPointsAttribute($value)
    {
        return $this->work_labels()->get()->sum('points');
    }

    public function getWorkPointsWithoutEngAttribute($value)
    {
        return $this->work_labels()->whereHas('subject', function (Builder $query) {
            $query->where('language', LanguageInterface::CS);
        })->get()->sum('points');
    }

    public function setAssignWorkLabelAttribute($value)
    {
        try {
            $this->work_labels()->add(WorkLabel::findOrFail($value));
        } catch (ModelNotFoundException $exception) {
            //
        }
    }
}
