<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updated(User $user)
    {

    }

    /**
     * @param User $user
     */
    public function updating(User $user)
    {
        if ($user->isDirty()) {
            foreach ($user->getDirty() as $key=>$val){
                $old_data[$key] = $user->getOriginal($key);
            }
            $message = 'Fields that are Changed are:' .json_encode($user->getDirty());
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'action' => 'update',
                'message' => $message,
                'dirty_data' => json_encode($old_data),
                'updated_data' => json_encode($user->getDirty()),
            ]);

            Log::info('Activity Log for Update Added!');
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $old_data = $user->getOriginal();
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'delete',
            'message' => 'User ' . $user->name . ' is Deleted',
            'dirty_data' => json_encode($old_data),
            'updated_data' => json_encode($user),
        ]);
        Log::info('Activity Log for Delete!');
    }

    /**
     * Handle the User "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
