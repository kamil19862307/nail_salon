<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class PostCreatedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /*
     * @var int
     */
    public int $delay = 3600;

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        $post = Post::query()->find($event->postId);

//        $updated = Post::query()->where('id', '=', $event->postId)->update(['fresh' => false]);


//        if ($updated){
        if ($post){
            $post->update(['fresh' => false]);

            Cache::flush();

//            Log::info('Создан новый пост: ', ['id' => $event->postId]);
            Log::info('Создан новый пост: ', ['title' => $post->title, 'id' => $post->id]);
        }else{
            Log::warning('Попытка логгирования, но пост не найден (id): ', ['id' => $post->id]);
        }
    }
}
