<?php

namespace App\Traits;

use App\Models\Activity;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        // User created
        static::created(function ($model) {
            if (auth()->check()) {
                Activity::log(
                    'user.created',
                    'Izveidoja jaunu lietotāju: "' . $model->name . '"',
                    ['user_id' => $model->id, 'email' => $model->email, 'role' => $model->role]
                );
            }
        });

        // User updated
        static::updated(function ($model) {
            if (auth()->check()) {
                $changes = $model->getChanges();
                
                // Only log if important fields changed
                $importantFields = ['name', 'email', 'role'];
                $changedImportant = array_intersect(array_keys($changes), $importantFields);
                
                if (!empty($changedImportant)) {
                    Activity::log(
                        'user.updated',
                        'Atjaunināja lietotāju: "' . $model->name . '"',
                        ['user_id' => $model->id, 'changes' => $changes]
                    );
                }
            }
        });

        // User deleted
        static::deleted(function ($model) {
            if (auth()->check()) {
                Activity::log(
                    'user.deleted',
                    'Dzēsa lietotāju: "' . $model->name . '"',
                    ['user_id' => $model->id, 'email' => $model->email, 'role' => $model->role]
                );
            }
        });
    }
}