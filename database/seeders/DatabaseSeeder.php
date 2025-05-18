<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Staff;
use App\Models\Partner;
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
        // Partner::truncate(); // vide la table districts
        // \App\Models\District::factory()->count(10)->create();

        $users     = User::where('role_id', '<>', 1)->get();
        $districts = District::all();
        // Créer 10 événements
        for ($i = 0; $i < 10; $i++) {
            Partner::create([
            'name' => $faker->company,
            'acronym' => strtoupper($faker->lexify('???')), // ex: ABC
            'link' => $faker->url,
            'image' => 'partner/partner' . rand(1, 3) . '.png',
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
