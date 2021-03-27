<?php namespace Conka\Secretary\Models;


use October\Rain\Database\Model;
use October\Rain\Database\Traits\Validation;

class Employee extends Model
{
    use Validation;

    public $table = 'conka_secretary_employees';

    protected $guarded = ['*'];

    protected $fillable = [];

    public array $rules = [];

    protected $casts = [];

    protected $jsonable = [];

    protected $appends = [];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
