<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(AdTableSeeder::class);
        $this->call(PaperTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(CollegeTableSeeder::class);
        $this->call(ClassificationTableSeeder::class);
        $this->call(QualificationTableSeeder::class);
        $this->call(MagazineTableSeeder::class);
        $this->call(ConferenceTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
