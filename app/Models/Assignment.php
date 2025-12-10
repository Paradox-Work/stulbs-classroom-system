<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    // CORRECT: These are the actual columns in the "assignments" table
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'subject_id',
        'teacher_id',
    ];
    
    // REMOVE THIS - original_name doesn't exist in assignments table!
    // protected $attributes = [
    //     'original_name' => 'Untitled',
    // ];
    
    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function files()
    {
        return $this->hasMany(AssignmentFile::class);
    }
}