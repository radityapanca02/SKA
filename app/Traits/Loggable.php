<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait Loggable
{
    public static function bootLoggable()
    {
        static::created(function ($model) {
            $model->logActivity('CREATE', $model->getDescription('created'));
        });

        static::updated(function ($model) {
            $model->logActivity('UPDATE', $model->getDescription('updated'), $model->getOriginal(), $model->getChanges());
        });

        static::deleted(function ($model) {
            $model->logActivity('DELETE', $model->getDescription('deleted'));
        });
    }

    protected function logActivity($action, $description, $oldData = null, $newData = null)
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'model_type' => get_class($this),
                'model_id' => $this->id,
                'description' => $description,
                'old_data' => $oldData ? json_encode($oldData) : null,
                'new_data' => $newData ? json_encode($newData) : null,
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
            ]);
        }
    }

    protected function getDescription($event)
    {
        $modelName = class_basename($this);

        return match($event) {
            'created' => "Created new {$modelName}: {$this->getIdentifier()}",
            'updated' => "Updated {$modelName}: {$this->getIdentifier()}",
            'deleted' => "Deleted {$modelName}: {$this->getIdentifier()}",
            default => "{$modelName} {$event}",
        };
    }

    protected function getIdentifier()
    {
        return $this->title ?? $this->name ?? $this->id;
    }
}
