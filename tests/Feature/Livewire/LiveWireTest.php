<?php

namespace Tests\Feature\Livewire;

use App\Livewire\LiveWire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LiveWireTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(LiveWire::class)
            ->assertStatus(200);
    }
}
