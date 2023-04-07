<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(role::class);
        $this->call(category::class);
        $this->call(comment::class);
        $this->call(complaint::class);
        $this->call(tag::class);
        $this->call(tag_publicacion::class);
        $this->call(save_publication::class);
        $this->call(publication::class);
        $this->call(reaction::class);
        $this->call(users::class);
    }
}
