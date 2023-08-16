<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Dotenv\Util\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'created_at' => $now,
                'updated_at' => $now,
                'guard_name' => 'Web',
            ],
        ]);

        $email = 'admin@admin.com';
        $password = App::isLocal() ? 'password' : Str::random(8);

        Log::warning("Security vulnerability! Update the account with the password, then delete this file!", [$email => $password]);

        DB::table('users')->insert([
            [
                'name' => 'Stephen',
                'email' => $email,
                'password' => bcrypt($password),
                'role_id' => Role::first()->id,
                'email_verified_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
