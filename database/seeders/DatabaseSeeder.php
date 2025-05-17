<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\District;
use App\Models\Staff;
use App\Models\User;
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
        Staff::truncate(); // vide la table districts
        // \App\Models\District::factory()->count(10)->create();

        $users     = User::where('role_id', '<>', 1)->get();
        $districts = District::all();
        // Créer 10 événements
        for ($i = 0; $i < 10; $i++) {
            Staff::create([
                'name'        => $faker->name(),
                'position'    => $faker->jobTitle(),
                'department'  => $faker->randomElement(['HR', 'Finance', 'IT', 'Education', 'Santé']),
                'start_date'  => $faker->date(),
                'email'       => $faker->unique()->safeEmail(),
                // 'image'       => 'documents/staff/default.jpg', // tu peux gérer le stockage réel si tu veux plus tard
                'bio'         => $faker->paragraph(4),
                'district_id' => $faker->randomElement($districts)->id ?? null,
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
