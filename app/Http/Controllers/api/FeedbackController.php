<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedback as StoreFeedbackRequest;
use App\Http\Services\FeedbackRepository;

class FeedbackController extends Controller
{
    //
    public $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function store(StoreFeedbackRequest $request)
    {
        $feedback = $this->feedbackRepository->getFeedback('FeedbackBd');
        $feedback->storeFeedback($request);
        return response()->json(['message'=>'Сообщение записано']);
    }
}
