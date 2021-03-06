<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_reply_body');
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function created(Reply $reply)
    {
        // Ignore When Seeding
        if (!app()->runningInConsole()){
            $reply->topic->updateReplyCount();

            // Make a notification to topic author when have a new reply
            $reply->topic->user->notify(new TopicReplied($reply));
        }

    }

    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
}
