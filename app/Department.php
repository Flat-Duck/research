<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
        ];
    }

    /**
     * Get the teachers for the Department.
     */
    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    // /**
    //  * Get the papers for the Department.
    //  */
    // public function papers()
    // {
    //     return $this->hasMany('App\Paper');
    // }

    /**
     * Get the colleges for the Department.
     */
    public function colleges()
    {
        return $this->belongsToMany('App\College');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
