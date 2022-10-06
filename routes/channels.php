<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{id}', function ($user, $id) {

    $participant = \App\Models\ChatParticipant::where([
        [
            'user_id',$user->id,
        ],
        [
            'chat_id',$id
        ]
    ])->first();

    return $participant !== null;
});
