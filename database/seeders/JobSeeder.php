<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory()->count(20)->create()->each(function(Job $job) {
            $job->tags()->attach(
                Tag::inRandomOrder()->take(rand(2, 3))->pluck('id')
            );
        });
    }
}
