<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function index() {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', [
            'title' => 'Feedback',
            'feedbacks' => $feedbacks
        ]);
    }
}
