<?php

namespace VojislavD\LaravelMessages\Tests\Feature;

use App\Actions\MarkMessageAsSeen;
use VojislavD\LaravelMessages\Models\User;
use VojislavD\LaravelMessages\Tests\TestCase;

class MarkMessageAsSeenActionTest extends TestCase
{
    /** @test */
    public function test_mark_message_as_seen()
    {
        $anotherUser = User::create([
            'name' => 'Another User',
            'email' => 'anotheruser@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $this->actingAs($anotherUser);

        $this->assertDatabaseHas('messages', [
            'thread_id' => $this->testThread->id,
            'user_id' => $this->testUser->id,
            'body' => $this->testMessage->body,
            'seen_at' => null
        ]);

        $updator = new MarkMessageAsSeen();
        
        $updator($this->testThread);

        $this->assertDatabaseHas('messages', [
            'thread_id' => $this->testThread->id,
            'user_id' => $this->testUser->id,
            'body' => $this->testMessage->body,
            'seen_at' => now()->toDateTimeString()
        ]);
    }
}