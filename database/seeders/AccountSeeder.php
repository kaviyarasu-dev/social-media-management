<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $accounts = [
            [
                'name' => 'Linkedin',
                'slug' => 'linkedin',
                'description' => 'Linkedin',
            ],
            [
                'name' => 'Twitter',
                'slug' => 'twitter',
                'description' => 'Twitter',
            ],
            [
                'name' => 'Facebook',
                'slug' => 'facebook',
                'description' => 'Facebook',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'description' => 'Instagram',
            ]
        ];

        foreach ($accounts as $account) {
            Account::create([
                'name' => $account['name'],
                'slug' => $account['slug'],
                'description' => $account['description'],
            ]);
        }
    }
}
