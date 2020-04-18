<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
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
            'departments' => 'required|array',
            'departments.*' => 'required|numeric|exists:departments,id',
        ];
    }

    /**
     * Get the teachers for the College.
     */
    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    /**
     * Get the papers for the College.
     */
    public function papers()
    {
        return $this->hasMany('App\Paper');
    }

    /**
     * Get the departments for the College.
     */
    public function departments()
    {
        return $this->belongsToMany('App\Department');
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
