<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)
            ->create();

        factory(App\Promoter::class, 30)
            ->create();

        factory(App\Project::class, 3)
            ->create()
            ->each(function($project){
                factory(App\Apartment::class, 100)
                    ->create(['project_id' => $project->id])
                    ->each(function($apartment){
                        $promoters = [];
                        $promoters_count = random_int(1, 2);
                        for($i = 0; $i < $promoters_count; $i++){
                            array_push($promoters, random_int(1, 30));
                        }
                        $sale = factory(App\Sale::class)->create(['apartment_id' => $apartment->id]);
                        $sale->promoters()->sync($promoters);
                        $apartment->sale()->save($sale);
                    });
        });
    }
}
