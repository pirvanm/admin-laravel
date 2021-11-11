<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Mail;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = User::all();
        $input['subject'] = $this->details['subject'];



        // Mail::send(['text'=>'mail.fun'], $data, function($message) {
        //     $message->to('abc@gmail.com', 'Tutorials Point')->subject
        //        ('Laravel Basic Testing Mail');
        //     $message->from('xyz@gmail.com','Virat Gandhi');
        //  });


        foreach ($data as $key => $value) {
       
        //     dump($value->email);
             $input['email'] = $value->email;
             $input['name'] = $value->name;

             Mail::send(['text'=>'mail.fun'], [], function($message) use($input) {
                $message->to($input['email'], $input['name'])
                ->subject($input['subject']);
                $message->from('pirvan.marian@gmail.com','noreplay');
            });

        //     \Mail::send('mail.fun', [], function($message) use($input){
        //         $message->to('pirvan.marian@gmail.com', $input['name'])
        //             ->subject($input['subject']);
        //     });
        }
    }
}