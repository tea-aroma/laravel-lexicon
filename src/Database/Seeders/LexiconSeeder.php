<?php

namespace TeaAroma\Lexicon\Database\Seeders;


use Illuminate\Database\Seeder;


/**
 * Provides the running all seeders for this package.
 */
class LexiconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(LanguagesSeeder::class);

        $this->call(TypesSeeder::class);

        $this->call(ContextsSeeder::class);
    }
}
