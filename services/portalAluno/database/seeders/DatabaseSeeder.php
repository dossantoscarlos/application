<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

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

        $curso = \App\Models\Curso::factory()->create();
        
        \App\Models\Turma::factory(1)->create([
            'numero' => fake()->numberBetween(1000 , 9000),
            'quantidade_atual' => 30,
            'quantidade_maxima' => 40,
            'curso_id' => $curso['id']
        ]);
    }
}
