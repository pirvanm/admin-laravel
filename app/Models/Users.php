<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use SoftDeletes;
    use HasFactory;

    
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Get the notes for the users.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Notes');
    }

    /**
     * The groups that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() //: BelongsToMany
    {
        return $this->belongsToMany(StudentGroup::class, 'user_group', 'user_id', 'group_id')->withTimestamps();
    }

}