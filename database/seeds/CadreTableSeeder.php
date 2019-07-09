<?php

use Illuminate\Database\Seeder;
use App\Cadre;
class CadreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cadres = [
            ['name' => 'Superintendent', 'acronym' => 'SC', 'is_commissioned' => 1],
            ['name' => 'Inspectorate', 'acronym' => 'IC', 'is_commissioned' => 0],
            ['name' => 'Corps Assistant', 'acronym' => 'CAC', 'is_commissioned' => 0]
        ];
        foreach($cadres as $cadre){
            Cadre::create($cadre);
        }
    }
}
