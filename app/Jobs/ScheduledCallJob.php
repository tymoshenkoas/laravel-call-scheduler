<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use App\Repositories\Interfaces\ArchiveCallRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ScheduledCallJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $scheduleId;

    /**
     * Create a new job instance.
     */
    public function __construct(string $scheduleId)
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * Execute the job.
     */
    public function handle(ScheduleRepositoryInterface $scheduleRepository, ArchiveCallRepositoryInterface $archiveCallRepository): void
    {
        $scheduledCall = $scheduleRepository->getById($this->scheduleId);

        Log::notice("phone number: " . $scheduledCall->phone_number . "; text: " . $scheduledCall->text);

        $archiveCallRepository->store($scheduledCall->toArray());

        $scheduleRepository->delete($scheduledCall->_id);
    }
}
