<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Discussion;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\DiscussionEvent;
use App\Events\DiscussionTypingEvent;
use App\Events\QuitDiscussionEvent;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class DiscussionController extends Controller
{
    public function listOfChannels()
    {
        $allDiscussions = Discussion::where('status', 0)->get();

        $discussionArray = [];

        $discussions = collect($discussionArray);

        if (count($allDiscussions) > 0) {
            foreach ($allDiscussions as $item)
            {
                if ($item->conversations()->latest()->limit(1)->value('person_status') == 'client') {

                    $discussionCreatedAt = $item->created_at;
                    $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

                    $timestamp1 = strtotime($discussionCreatedAt);
                    $timestamp2 = strtotime($getNow);

                    $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

                    if ($diffHour < 2) {
                        $discussionArray[] = $item;
                        $discussions = collect($discussionArray);
                    }
                }
            }
        }

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.list', compact('discussions', 'page', 'page_item'));
    }

    public function conversationByAdmin(Discussion $discussion)
    {
        $checkDiscussion = Discussion::where('id', $discussion->id)->first();

        if ($checkDiscussion == null) {
            abort(404);
        }

        $discussionCreatedAt = $discussion->created_at;
        $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

        $timestamp1 = strtotime($discussionCreatedAt);
        $timestamp2 = strtotime($getNow);

        $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

        if ($diffHour > 2) {
            return redirect()->route('admin.conversationNotClosedButExpiredShow', $discussion)->with('error', 'Discussion expirée');
        }

        $conversations = Conversation::where('discussion_id', $discussion->id)->get();

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.conversations', compact('conversations', 'discussion', 'page', 'page_item'));
    }

    public function typing($messageVal)
    {
        if (session()->has('tahc_ad') && session()->get('tahc_ad') != '') {

            $discussion = Discussion::where('custom_id', session()->get('tahc_ad'))->first();

            if ($discussion != null) {

                if (!$discussion->status) {
                    DiscussionTypingEvent::dispatch($discussion, $messageVal);

                } else {
                    DiscussionTypingEvent::dispatch($discussion, $messageVal);
                }
            }
        }
    }

    public function sendMessageByAdmin(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ], [
            'message.required' => 'Message vide !'
        ]);

        $publishedDate = '';

        if (session()->has('tahc_ad') && session()->get('tahc_ad') != '') {

            $checkIfDiscussionExist = Discussion::where('custom_id', session()->get('tahc_ad'))->first();

            if ($checkIfDiscussionExist != null) {

                if (!$checkIfDiscussionExist->status) {

                    $conversation = Conversation::create([
                        'discussion_id' => $checkIfDiscussionExist->id,
                        'person_status' => 'server',
                        'message' => $request->message
                    ]);

                    $publishedDate = Carbon::parse($conversation->created_at)->format('d/m/Y') . " à " . Carbon::parse($conversation->created_at)->format('H:i');

                }

            }
        } else {
            $publishedDate = Carbon::parse(now())->format('d/m/Y') . " à " . Carbon::parseFromLocale(now())->format('H:i');
        }

        $message = [
            'message' => $request->message,
            'author' => 'Bureau Golfe1',
            'published_date' => $publishedDate
        ];

        DiscussionEvent::dispatch($message, $checkIfDiscussionExist);
    }

    public function quitDiscussion()
    {
        $status = '';

        if (session()->has('tahc_ad') && session()->get('tahc_ad') != '') {

            $discussion = Discussion::where('custom_id', session()->get('tahc_ad'))->first();

            if ($discussion != null) {

                if (!$discussion->status) {

                    $discussion->update([
                        'status' => true
                    ]);
                    $backUrl = URL::route('admin.discussions.list');
                    $status = '200';

                    QuitDiscussionEvent::dispatch($discussion);

                } else {
                    $backUrl = URL::route('admin.discussions.list');
                    $status = '500';
                    QuitDiscussionEvent::dispatch($discussion);
                }
            } else {
                $backUrl = URL::route('admin.discussions.list');
                $status = '404';
                QuitDiscussionEvent::dispatch($discussion);
            }
        } else {
            $backUrl = URL::route('admin.discussions.list');
            $status = '404';
        }

        return $response = [
            'status' => $status,
            'url' => $backUrl
        ];
    }

    public function conversationNotClosedButReadIndex()
    {
        $conversations = Conversation::join('discussions', 'discussions.id', 'conversations.discussion_id')
        ->groupBy('discussions.id')
        ->where('discussions.status', 0)
        ->orderByDesc('discussions.updated_at')
        ->get();

        $discussionArray = [];

        $discussions = collect($discussionArray);

        if (count($conversations) > 0) {
            foreach ($conversations as $conversation)
            {
                $discussionCreatedAt = $conversation->discussion->created_at;
                $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

                $timestamp1 = strtotime($discussionCreatedAt);
                $timestamp2 = strtotime($getNow);

                $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

                if ($diffHour < 2) {
                    $discussionArray[] = $conversation->discussion()->first();
                    $discussions = collect($discussionArray);
                }

            }
        }

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.read.index', compact('discussions', 'page', 'page_item'));
    }

    public function conversationNotClosedButReadShow(Discussion $discussion)
    {
        $findDiscussion = Discussion::where('id', $discussion->id);

        if ($findDiscussion->doesntExist()) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $discussionCreatedAt = $discussion->created_at;
        $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

        $timestamp1 = strtotime($discussionCreatedAt);
        $timestamp2 = strtotime($getNow);

        $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

        if ($diffHour > 2 || $discussion->status == 1) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $conversations = Conversation::where('discussion_id', $discussion->id)->get();

        if (count($conversations) == 0) {
            return redirect()->back()->with('error', 'Conversation introuvable');
        }

        return view('admin.discussions.conversations', compact('discussion', 'conversations'));
    }

    public function conversationNotClosedButExpiredIndex()
    {
        $conversations = Conversation::join('discussions', 'discussions.id', 'conversations.discussion_id')
        ->groupBy('discussions.id')
        ->where('discussions.status', 0)
        ->orderByDesc('discussions.updated_at')
        ->get();

        $discussionArray = [];

        $discussions = collect($discussionArray);

        if (count($conversations) > 0) {
            foreach ($conversations as $conversation)
            {
                $discussionCreatedAt = $conversation->discussion->created_at;
                $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

                $timestamp1 = strtotime($discussionCreatedAt);
                $timestamp2 = strtotime($getNow);

                $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

                if ($diffHour > 2) {
                    $discussionArray[] = $conversation->discussion()->first();
                    $discussions = collect($discussionArray);
                }

            }
        }

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.expired.index', compact('discussions', 'page', 'page_item'));
    }

    public function conversationNotClosedButExpiredShow(Discussion $discussion)
    {
        $findDiscussion = Discussion::where('id', $discussion->id);

        if ($findDiscussion->doesntExist()) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $discussionCreatedAt = $discussion->created_at;
        $getNow = Carbon::parse(now())->format("Y-m-d H:i:s");

        $timestamp1 = strtotime($discussionCreatedAt);
        $timestamp2 = strtotime($getNow);

        $diffHour = abs($timestamp2 - $timestamp1)/(60*60);

        if ($diffHour < 2 || $discussion->status == 1) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $conversations = Conversation::where('discussion_id', $discussion->id)->get();

        if (count($conversations) == 0) {
            return redirect()->back()->with('error', 'Conversation introuvable');
        }

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.expired.show', compact('discussion', 'conversations', 'page', 'page_item'));
    }

    public function closeExpiredDiscussion(Discussion $discussion)
    {
        $findDiscussion = Discussion::where('id', $discussion->id);

        if ($findDiscussion->doesntExist()) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $discussion->update([
            'status' => true
        ]);

        return redirect()->route('admin.discussions.list')->with('success', 'Discussion fermée avec succès');
    }

    public function conversationClosedIndex()
    {
        // $conversations = Conversation::join('discussions', 'discussions.id', 'conversations.discussion_id')
        // ->where('discussions.status', 1)
        // ->orderByDesc('discussions.updated_at')
        // ->get();

        // $origin = Carbon::create(2022,06,02,16,06,52);
        // $target = Carbon::create(2022,06,02,18,11,18);
        // $interval = $target->diffInHours($origin);

        // dd($interval);

        $discussions = Discussion::where('status', 1)->orderByDesc('updated_at')->get();

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.closed.index', compact('discussions', 'page', 'page_item'));
    }

    public function conversationClosedShow(Discussion $discussion)
    {
        $findDiscussion = Discussion::where('id', $discussion->id);

        if ($findDiscussion->doesntExist()) {
            return redirect()->back()->with('error', 'Discussion introuvable');
        }

        $conversations = Conversation::where('discussion_id', $discussion->id)->get();

        if (count($conversations) == 0) {
            return redirect()->back()->with('error', 'Conversation introuvable');
        }

        $page = 'admin.discussions';
        $page_item = '';

        return view('admin.discussions.closed.show', compact('discussion', 'conversations', 'page', 'page_item'));
    }
}
