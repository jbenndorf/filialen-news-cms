<?php

namespace Database\Seeders;

use App\Models\Filiale;
use Illuminate\Database\Seeder;

class FilialenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filialen = collect([
            ['name' => 'Nord'],
            ['name' => 'Süd'],
            ['name' => 'Ost'],
            ['name' => 'West'],
            ['name' => 'Mitte']
        ]);

        $filialen->each(function (array $filiale) {
            Filiale::factory()->create($filiale);
        });
    }
}
