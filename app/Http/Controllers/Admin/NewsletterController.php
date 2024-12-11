<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function index()
    {
        $page = 'admin.newsletter';
        $page_item = '';

        return view('admin.newsletter', compact('page', 'page_item'));
    }

    public function inscritToNewsletter()
    {
        $newsletters = Newsletter::all();

        $page = 'admin.newsletter';
        $page_item = '';

        return view('admin.inscrit-Newsletter', compact('newsletters', 'page', 'page_item'));
    }
}
