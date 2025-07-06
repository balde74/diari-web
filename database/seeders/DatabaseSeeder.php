<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Staff;
use App\Models\Partner;
use App\Models\Project;
use App\Models\District;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
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
        Project::truncate(); // vide la table districts
        // \App\Models\District::factory()->count(10)->create();

        $users     = User::where('role_id', '<>', 1)->get();
        // $districts = District::all();
        // Créer 10 événements
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(6, true);
    
            Project::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . Str::random(5),
                'description' => $faker->paragraphs(14, true),
                'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+1 year'),
                'status' => $faker->randomElement(['prévu', 'en cours', 'realisé']),
                'budget' => $faker->randomFloat(2, 1000000, 50000000),
                // décommente si tu veux vraiment créer une image factice
                // 'image' => $faker->image('public/documents', 640, 480, null, false), 
                // 'image' => $faker->randomElement(['project1.jpg', 'project2.jpg', 'project3.jpg', null]),
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
