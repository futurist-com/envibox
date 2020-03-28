<?php

namespace App\Http\Services;

use App\Http\Services\FeedbackBd;

class FeedbackRepository
{

    public function getFeedback($repository)
    {
        if ($repository == "FeedbackBd") {
            return new FeedbackBd();
        }
    }
}
