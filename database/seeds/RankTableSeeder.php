<?php

use Illuminate\Database\Seeder;
use App\Rank;
class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ranks = [
            ['cadre_id'=> 1, 'name' => 'Assistant Superintendent of Corps I', 'acronym' => 'ASCII', 'gl' => 9],
            ['cadre_id'=> 1, 'name' => 'Assistant Superintendent of Corps II', 'acronym' => 'ASCII', 'gl' => 8],
            ['cadre_id'=> 2, 'name' => 'Inspector of Corps I', 'acronym' => 'IC', 'gl' => 7],
            ['cadre_id'=> 2, 'name' => 'Assistant Inspector of Corps', 'acronym' => 'AIC', 'gl' => 6],
            ['cadre_id'=> 3, 'name' => 'Corps Assistant I', 'acronym' => 'CAI', 'gl' => 5],
            ['cadre_id'=> 3, 'name' => 'Corps Assistant II', 'acronym' => 'CAII', 'gl' => 4],
            ['cadre_id'=> 3, 'name' => 'Corps Assistant III', 'acronym' => 'CAIII', 'gl' => 3]
        ];

        foreach($ranks as $rank){
            Rank::create($rank);
        }
    }
}
