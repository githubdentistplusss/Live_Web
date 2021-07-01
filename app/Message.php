<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Lexx\ChatMessenger\Models\Message as BaseModel;

class Message extends BaseModel
{
    protected $fillable = ['thread_id', 'user_id', 'body', 'type','device_id','file'];

     /**
     * Returns unread messages given the userId.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnreadMsgsForUser(Builder $query, $userId, $userType)
    {
        return $query->has('thread')
            ->where('user_id', '!=', $userId)
            ->whereHas('participants', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereNull('deleted_at')
                    ->where(function (Builder $q) {
                        $q->where('last_read', '<', $this->getConnection()->raw($this->getConnection()->getTablePrefix() . $this->getTable() . '.created_at'))
                            ->orWhereNull('last_read');
                    });
            });
    }

     /**
     * Attachment relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @codeCoverageIgnore
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class , 'message_id');
    }

}