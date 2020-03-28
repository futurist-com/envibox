<?php

namespace App\Http\Services;

use App\Http\Contracts\Feedback as FeedbackInteface;
use App\Model\Feedback;

class FeedbackBd implements FeedbackInteface
{

    public function storeFeedback($request)
    {
        Feedback::create($request->all());
    }
}
