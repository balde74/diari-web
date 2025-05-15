<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Event;
use App\Models\District;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');
        // \App\Models\User::factory(10)->create();
        Event::truncate(); // vide la table districts
        // \App\Models\District::factory()->count(10)->create();

        $users = User::where('role_id','<>',1)->get();
        $districts = District::all();
         // Créer 10 événements
        for ($i = 0; $i < 10; $i++) {
            Event::create([
                'title' => $faker->sentence(3),
                'place' => $faker->city,
                'description' => $faker->paragraphs(18,true),
                'date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'district_id' => $faker->randomElement($districts)->id,
                'user_id' => $users->random()->id,
            ]);
        }
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     DistrictSeeder::class,

        // ]);
    }
}
