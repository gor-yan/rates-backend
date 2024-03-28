<?php

namespace App\Console\Commands;

use App\Services\RateService;
use Illuminate\Console\Command;

class PullRates extends Command
{
    /**
     * @var RateService
     */
    private $service;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get rates data and send to pusher';

    /**
     * PullRates constructor.
     * @param RateService $rateService
     */
    public function __construct(RateService $rateService)
    {
        parent::__construct();
        $this->service = $rateService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->service->pull();
    }
}
