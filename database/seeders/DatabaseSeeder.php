<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Staff;
use App\Models\Partner;
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
        Post::truncate(); // vide la table districts
        // \App\Models\District::factory()->count(10)->create();

        $users     = User::where('role_id', '<>', 1)->get();
        $districts = District::all();
        // Créer 10 événements
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(6, true);
            Post::create([
                'title' => $title,
                // 'image' => $faker->optional()->image('public/documents', 640, 480, null, false), // génère une image dans public/documents
                'introduction' => $faker->paragraphs(3, true),
                'slug' => Str::slug($title) . '-' . Str::random(5), // assure unicité du slug
                'publish' => $faker->boolean(70), // 70% des posts sont publiés
                'district_id' => $districts->random()->id ?? null,
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
