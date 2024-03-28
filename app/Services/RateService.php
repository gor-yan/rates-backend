<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Events\Message;


class RateService
{
    /**
     * @var mixed
     */
    private $url;

    /**
     * RateService constructor.
     */
    public function __construct()
    {
        $this->url = env('API_URL');
    }

    /**
     * Get Data from API URL
     * @return bool
     */
    public function pull()
    {
        try {
            $response = Http::get($this->url);
            Log::info('Data received: ' .$response->body());

            $this->send($response->body());
            return true;
        } catch (\Exception $exception) {
            Log::error('Data receive error: ' .$exception->getMessage());
            return false;
        }
    }

    /**
     * @param $message
     * @return bool
     */
    public function send($message)
    {
       try{
           event(new Message($message));
           Log::info('Event sent successfully');
           return true;
       }catch (\Exception $e){
           Log::error('Event send error: ' .$e->getMessage());
           return false;
       }
    }
}