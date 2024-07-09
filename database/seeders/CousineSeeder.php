<?php

namespace Database\Seeders;

use App\Models\Cousine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CousineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cousines = ['Italian', 'International', 'Chinese', 'Japanese', 'Mexican', 'Indian', 'Fish', 'Pizza', 'Vegan', 'American'];

        foreach ($cousines as $cousine) {
            $newCousine = new Cousine();
            $newCousine->name = $cousine;
            $newCousine->save();
        }
    }
}
