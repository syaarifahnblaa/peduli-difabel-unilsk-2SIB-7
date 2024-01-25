<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // \App\Models\User::factory(10)->create();
         \DB::table('users')->insert([
            [
                'name' => 'ipeh',
                'email' => 'ipeh@pcr.ac.id',
                'password' => \Hash::make('ipeh@pcr.ac.id'),
                'admin' => true,
            ],
            [
                'name' => 'syaifah',
                'email' => 'syaifah@pcr.ac.id',
                'password' => \Hash::make('syaifah@pcr.ac.id'),
                'admin' => false,
            ],

        ]);
    }
}
