<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Sagar Lakshkar',
                'email' => 'sagarlakshkar23@gmail.com',
                'password' => 'sagar@740@',
            ],
            [
                'name' => 'Famous Tours India',
                'email' => 'famoustoursindia@gmail.com',
                'password' => 'hemraj@1979@',
            ]
        ];

        foreach ($admins as $admin) {
            // Check if user exists
            $user = User::where('email', $admin['email'])->first();

            if (!$user) {
                User::create([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => Hash::make($admin['password']),
                ]);
                $this->command->info("Created admin: {$admin['email']}");
            } else {
                $user->update([
                    'password' => Hash::make($admin['password']),
                ]);
                $this->command->info("Updated admin password: {$admin['email']}");
            }
        }
    }
}
