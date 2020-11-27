<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paper extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * Static options for the Type
     *
     * @var array
     */
    public static $typeOptions = [
        1 => 'Type option 1',
        2 => 'Type option 2',
        3 => 'Type option 3',
        4 => 'Type option 4',
        5 => 'Type option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'type', 'published_at', 'publish_place', 'pages', 'references', 'attachments', 'college_id', 'department_id', 'magazine_id', 'conference_id','country','classification_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
           // 'type' => 'required|numeric',
            'published_at' => 'required|date',
           // 'publish_place' => 'required|boolean',
            'pages' => 'required|numeric',
            'references' => 'required|numeric',
            'attachments' => 'nullable|file',
            'college_id' => 'required|numeric|exists:colleges,id',
            'department_id' => 'required|numeric|exists:departments,id',
            'magazine_id' => 'required|numeric|exists:magazines,id',
            'conference_id' => 'required|numeric|exists:conferences,id',
            'classification_id' => 'required|numeric|exists:classifications,id',
            'teachers' => 'required|array',
            'teachers.*' => 'required|numeric|exists:teachers,id',
        ];
    }

    /**
     * Returns the Type of the order
     *
     * @return string
     */
    public function getType()
    {
        return static::$typeOptions[$this->type];
    }

    /**
     * Spatie media library collections
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('attachments')->singleFile();
    }

    /**
     * Get the college for the Paper.
     */
    public function college()
    {
        return $this->belongsTo('App\College');
    }

    /**
     * Get the department for the Paper.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get the magazine for the Paper.
     */
    public function magazine()
    {
        return $this->belongsTo('App\Magazine');
    }

    /**
     * Get the conference for the Paper.
     */
    public function conference()
    {
        return $this->belongsTo('App\Conference');
    }
    /**
     * Get the conference for the Paper.
     */
    public function classification()
    {
        return $this->belongsTo('App\Classification');
    }

    /**
     * Get the teachers for the Paper.
     */
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['college', 'department', 'magazine', 'conference', 'media'])->paginate(10);
    }
}
