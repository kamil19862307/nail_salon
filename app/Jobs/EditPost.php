<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class EditPost implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->post->update([
            'title' => Str::squish($this->post->title),
            'content' => Str::squish($this->post->content),
            'slug' => Str::slug(Str::squish($this->post->title))
            ]);
    }
}
