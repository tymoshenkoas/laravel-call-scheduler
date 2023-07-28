<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduledCallRequest;
use App\Models\Schedule;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;

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
        $this->scheduleRepository->store($request->validated());

        return response()->json(['message' => 'Successfully created'], 201);
    }
}
