<?php

namespace App\Http\Controllers\Guests;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\DiscussionEvent;
use App\Events\NotifyUserEvent;
use App\Events\GuestTypingEvent;
use App\Events\QuitDiscussionEvent;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Events\DiscussionTypingEvent;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DiscussionNotification;

class DiscussionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('maintenance');
    // }

    public function typing($messageVal)
    {
        if (isset($_COOKIE['tahc_live'])) {

            $discussion = Discussion::where('creator', $_COOKIE['tahc_live'])->first();

            if ($discussion != null) {

                if (!$discussion->status) {
                    GuestTypingEvent::dispatch($discussion, $messageVal);

                } else {
                    GuestTypingEvent::dispatch($discussion, $messageVal);
                }
            }
        }
    }

    public function sendMessageByClient(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ], [
            'message.required' => 'Message vide !'
        ]);

        $publishedDate = '';

        $creator = '';

        $discussion = collect();

        if (isset($_COOKIE['tahc_live'])) {

            $discussion = Discussion::where('creator', $_COOKIE['tahc_live'])->first();

            if ($discussion != null) {

                if (!$discussion->status) {

                    $conversation = Conversation::create([
                        'discussion_id' => $discussion->id,
                        'person_status' => 'client',
                        'message' => $request->message
                    ]);

                    $publishedDate = Carbon::parse($conversation->created_at)->format('d/m/Y à H:i');
                    $notifiedDate = Carbon::parse($conversation->created_at)->diffForHumans();

                    // $users = User::all();

                    // Notification::send($users, new DiscussionNotification($discussion));
                }

            }
        } else {
            $publishedDate = Carbon::parse(now())->format('d/m/Y à H:i');
            $notifiedDate = Carbon::parse(now())->diffForHumans();
            $creator = '';
        }

        $message = [
            'message' => $request->message,
            'author' => 'Vous',
            'published_date' => $publishedDate
        ];

        $notifyMessage = [
            'message' => $request->message,
            'published_date' => $notifiedDate
        ];

        DiscussionEvent::dispatch($message, $discussion);

        NotifyUserEvent::dispatch($discussion, $notifyMessage);
    }

    public function leaveDiscussion()
    {
        $status = '';

        if (isset($_COOKIE['tahc_live'])) {

            $cookie_name = "tahc_live";

            $discussion = Discussion::where('creator', $_COOKIE['tahc_live'])->first();

            if ($discussion != null) {

                if (!$discussion->status) {

                    $discussion->update([
                        'status' => true
                    ]);

                    setcookie($cookie_name, '', time() - (3600), "/");
                    $backUrl = URL::route('guests.startConversation');
                    $status = '200';

                    QuitDiscussionEvent::dispatch($discussion);

                } else {
                    setcookie($cookie_name, '', time() - (3600), "/");
                    $backUrl = URL::route('guests.startConversation');
                    $status = '500';
                    QuitDiscussionEvent::dispatch($discussion);
                }

            } else {
                setcookie($cookie_name, '', time() - (3600), "/");
                $backUrl = URL::route('guests.startConversation');
                $status = '404';
                QuitDiscussionEvent::dispatch($discussion);
            }
        } else {
            $backUrl = URL::route('guests.startConversation');
            $status = '404';
        }

        return $response = [
            'status' => $status,
            'url' => $backUrl
        ];
    }

}
