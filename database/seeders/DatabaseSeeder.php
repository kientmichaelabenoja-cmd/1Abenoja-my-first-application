<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //   'email' => 'test@example.com',
        //]);

    // For SQLite, use delete() instead of truncate()
    DB::table('tags')->delete();

        // Generate 10 unique tag names
        $uniqueTagNames = collect();
        while ($uniqueTagNames->count() < 10) {
            $name = fake()->unique()->word();
            if (!$uniqueTagNames->contains($name)) {
                $uniqueTagNames->push($name);
            }
        }
        $tags = collect();
        foreach ($uniqueTagNames as $name) {
            $tags->push(Tag::create(['name' => $name]));
        }

        Job::factory(20)->create()->each(function($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
