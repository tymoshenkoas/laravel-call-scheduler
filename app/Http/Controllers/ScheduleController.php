<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduledCallRequest;
use App\Models\Schedule;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use App\Jobs\ScheduledCallJob;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    private $scheduleRepository;

    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function index()
    {
        return view('schedules.list');
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(StoreScheduledCallRequest $request)
    {
        $scheduledCall = $this->scheduleRepository->store($request->validated());

        ScheduledCallJob::dispatch($scheduledCall->_id)
            ->delay(Carbon::createFromFormat('Y-m-d H:i:s', $scheduledCall->time));

        return response()->json(['message' => 'Successfully created'], 201);
    }
}
