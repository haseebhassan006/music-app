<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


use Illuminate\Support\Str;
use Response;
use DB;
use Config;
use Image;
use Storage;
use Validator;
use File;


class ProcessPreview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model;
    protected $audio;
    protected $isHd;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model, $audio, $isHd = false)
    {
        $this->model = $model;
        $this->audio = $audio;
        $this->isHd = $isHd;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tempFile = Str::random(10) . '.mp3';
        exec(env('FFMPEG_PATH', '/usr/bin/ffmpeg') . ' -t 30 -i ' . $this->audio->path . ' -b:a ' . intval(config('settings.audio_preview_bitrate', 128)) . 'k -acodec copy ' . Storage::disk('public')->path($tempFile), $status, $var);

        if(intval($var) == 0) {
            $this->model->addMedia(Storage::disk('public')->path($tempFile))->toMediaCollection('preview', config('settings.storage_audio_location', 'public'));
            $this->model->preview = 1;
            $this->model->save();
        } else {
            abort(500, 'Preview conversion has failed!');
        }
    }
}
