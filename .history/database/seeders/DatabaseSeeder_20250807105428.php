<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\Role\RoleSeeder as RoleRoleSeeder;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RoleSeeder;
use App\Models\TermsAndCondition;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdCategorySeeder::class,
            AdSubCategorySeeder::class,
            AdSubSubCategorySeeder::class,
            FaqsSeeder::class,
            AboutUsSeeder::class,
            HowItWorksSeeder::class,
            SettingSeeder::class,
            CompanyTypeSeeder::class,
            JobTitleSeeder::class,
            TermsAndConditionSeeder::class,
            PrivacyPolicySeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            PlanCategorySeeder::class,
            PlanSeeder::class,
            AddonSeeder::class,
            Feature
            // PlanFeatureSeeder::class,
            // PlanLimitSeeder::class,
            
            

        ]);
    }
}
