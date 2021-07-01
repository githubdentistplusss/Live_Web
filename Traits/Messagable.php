<?php

namespace App\Traits;

use App\Message;
use Lexx\ChatMessenger\Traits\Messagable as LexxMessagable;
use Lexx\ChatMessenger\Models\Models;


trait Messagable
{

    use LexxMessagable;

    /**
     * Message relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @codeCoverageIgnore
     */
    public function messages()
    {
        return $this->hasMany(Models::classname(Message::class));
    }


    /**
     * Returns the new messages for user.
     *
     * @return int
     */
    public function unreadMessages()
    {
        if(isset($this->hospital))
        { $type=1;}
        else{ $type=2; }

        return Message::unreadMsgsForUser($this->getKey(),$type)->get();
    }

    /**
     * Returns the new messages count for user.
     *
     * @return int
     */
    public function unreadMessagesCount()
    {
        return count($this->unreadMessages());
    }

}
