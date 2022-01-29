<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Workspace;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTimeRemainingAttribute()
    {
        $deadline = Carbon::parse($this->deadline);

        if(!$this->finished_on){
            $now = Carbon::now();
            return Carbon::create($deadline)->diffForHumans();
            // return Carbon::now()->sub($deadline)->calendar();
            // return Carbon::now()->diffForHumans($deadline);
            // return Carbon::create($this->deadline)->longRelativeDiffForHumans($now);
        }
        return '-';

    }

    public function getSubmissionTimeAttribute()
    {
        if($this->finished_on){
            return Carbon::create($this->finished_on)->longRelativeDiffForHumans($this->deadline);
        }
        return '-';
    }

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    public function getUserIdAttribute(){
        if($this->workspace){
            return $this->workspace->user->id;
        }
    }
}
