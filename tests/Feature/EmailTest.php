<?php

namespace Tests\Feature;

use App\Mail\SendMailUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Prophecy\PhpUnit\ProphecyTrait;
use Tests\TestCase;

class EmailTest extends TestCase
{
    use ProphecyTrait;

    public function test_has_been_sent()
    {
        Mail::fake();

        $faker = User::factory()->make();

        Mail::to($faker)->send(new SendMailUser($faker));

        Mail::assertSent(SendMailUser::class);
    }
}
