<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventComment;
use App\Models\EventSliderImage;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(40)->state(new Sequence(
            ['status' => 1],
            ['status' => 0],
        ))->create();
        EventSliderImage::factory()
                ->count(8)
                ->state(new Sequence(
                    ['slider_imagename' => 'event1.jpg'],
                    ['slider_imagename' => 'event2.jpg'],
                    ['slider_imagename' => 'event3.jpg'],
                    ['slider_imagename' => 'event4.jpg'],
                    ['slider_imagename' => 'event5.jpg'],
                    ['slider_imagename' => 'event6.jpg'],
                    ['slider_imagename' => 'event7.jpg'],
                    ['slider_imagename' => 'event8.jpg'],
                ))
                ->create();
        EventComment::factory()
                ->count(100)
                ->create();        
        Ticket::factory()
                ->count(20)
                // ->state(new Sequence(
                //     ['tickettype' => 'VVIP'],
                //     ['tickettype' => 'Regular'],
                // ))
                ->create();
    }
}
