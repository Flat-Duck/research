<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    /**
     * Static options for the Gender
     *
     * @var array
     */
    public static $genderOptions = [
        1 => 'ذكر',
        2 => 'أنثى',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'phone', 'email', 'qualification_id', 'nationality_id', 'college_id', 'department_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
            'gender' => 'required|numeric',
            'phone' => 'required|string',
            'email' => 'required|email',
            'qualification_id' => 'required|numeric|exists:qualifications,id',
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'college_id' => 'required|numeric|exists:colleges,id',
            'department_id' => 'required|numeric|exists:departments,id',
        ];
    }

    /**
     * Returns the Gender of the order
     *
     * @return string
     */
    public function getGender()
    {
        return static::$genderOptions[$this->gender];
    }

    /**
     * Get the qualification for the Teacher.
     */
    public function qualification()
    {
        return $this->belongsTo('App\Qualification');
    }

    /**
     * Get the nationality for the Teacher.
     */
    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    /**
     * Get the college for the Teacher.
     */
    public function college()
    {
        return $this->belongsTo('App\College');
    }

    /**
     * Get the department for the Teacher.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get the papers for the Teacher.
     */
    public function papers()
    {
        return $this->belongsToMany('App\Paper');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['qualification', 'nationality', 'college', 'department'])->paginate(10);
    }
}
