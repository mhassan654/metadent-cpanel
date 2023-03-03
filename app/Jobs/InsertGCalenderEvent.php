<?php

namespace App\Jobs;

use App\Models\Patient;
use App\Traits\AppointmentsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertGCalenderEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, AppointmentsTrait;

    private $patient;
    private $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Patient $patient,$id)
    {
        $this->patient = $patient;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->storeEvent($this->patient,$this->id);
    }
}
