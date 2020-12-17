<?php

use App\Models\Experience;
use App\Models\Job;
use App\Models\ProgramStudy;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserProfile;
use App\Models\UserWorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. DATA ROLES
        $roles = ['Admin', 'User'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // 2. DATA EXPERIENCES
        $experiences = [
            'Fresh Graduates', 'Junior Staff', 'Staff', 'Senior Staff', 'Supervisor', 'Coordinator', 'Team Leader'
        ];

        foreach ($experiences as $key => $experience) {
            $maxValue = Experience::max('maximum_experience_of_year');
            Experience::create([
                'name' => $experience,
                'minimum_experience_of_year' => $maxValue === null ? 0 : $maxValue + 1,
                'maximum_experience_of_year' => $maxValue === null ? 1 : $maxValue + 2
            ]);
        }

        // 3. DATA PROGRAM STUDY
        $program_studies = ['Teknik Informatika', 'Teknik Sipil', 'Teknik Industri'];

        foreach ($program_studies as $program_study) {
            ProgramStudy::create(['name' => $program_study]);
        }

        // 4. DATA USERS
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);

        $admin_profile = factory(UserProfile::class)->make();
        $admin->profile()->save($admin_profile);
        $admin->assignRole('Admin');

        factory(User::class)
            ->times(5)
            ->create()
            ->each(function ($user) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->save($profile);
                $user->assignRole('User');
                factory(UserEducation::class)
                    ->times(random_int(3, 5))
                    ->make()
                    ->each(static function ($education) use ($user) {
                        $education->user()->associate($user);
                        $education->save();
                    });

                factory(UserWorkExperience::class)
                    ->times(random_int(3, 5))
                    ->make()
                    ->each(static function ($experience) use ($user) {
                        $experience->user()->associate($user);
                        $experience->save();
                    });
            });

        // 5. JOB
        factory(Job::class)
            ->times(20)
            ->make()
            ->each(static function ($job) {
                $job->experience()->associate(Experience::all()->random());
                $job->programStudy()->associate(ProgramStudy::all()->random());
                $job->save();
            });
    }
}
