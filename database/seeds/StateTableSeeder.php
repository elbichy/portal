<?php

use Illuminate\Database\Seeder;
use App\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['state_name' => 'abia'],
            ['state_name' => 'adamawa'],
            ['state_name' => 'akwa-ibom'],
            ['state_name' => 'anambra'],
            ['state_name' => 'bauchi'],
            ['state_name' => 'bayelsa'],
            ['state_name' => 'benue'],
            ['state_name' => 'borno'],
            ['state_name' => 'cross-river'],
            ['state_name' => 'delta'],
            ['state_name' => 'ebonyi'],
            ['state_name' => 'edo'],
            ['state_name' => 'ekiti'],
            ['state_name' => 'enugu'],
            ['state_name' => 'fct'],
            ['state_name' => 'gombe'],
            ['state_name' => 'imo'],
            ['state_name' => 'jigawa'],
            ['state_name' => 'kaduna'],
            ['state_name' => 'kano'],
            ['state_name' => 'katsina'],
            ['state_name' => 'kebbi'],
            ['state_name' => 'kogi'],
            ['state_name' => 'kwara'],
            ['state_name' => 'lagos'],
            ['state_name' => 'nasarawa'],
            ['state_name' => 'niger'],
            ['state_name' => 'ogun'],
            ['state_name' => 'ondo'],
            ['state_name' => 'osun'],
            ['state_name' => 'oyo'],
            ['state_name' => 'plateau'],
            ['state_name' => 'rivers'],
            ['state_name' => 'sokoto'],
            ['state_name' => 'taraba'],
            ['state_name' => 'yobe'],
            ['state_name' => 'zamfara']
          ];


        foreach($states as $state){
            State::create($state);
        }
    }
}
