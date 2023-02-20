<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::create([
            'name' => 'Tenant'
        ]);

        $profile->permissions()->sync([
            '651b1ba3-504f-49d4-b13c-422c4bd1e8c7',
            '1b8e1d2c-fc8a-4292-aeee-7ff65c524848',
            'e163cd97-36e2-4a33-b503-1426cd4ff206',
        ]);

        DB::table('plan_profile')->insert([[
            'plan_id' => '471a4139-4c96-498d-b1b2-546169a8e3cd',
            'profile_id' => $profile->id,
        ]]);
    }
}
