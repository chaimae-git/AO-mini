<?php

namespace Database\Seeders;

use App\Models\Bu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus')->delete();

        $bus = [
            [
                'id'=> 1,
                'nom'=>'bu xyz',
                'description'=>'description 1'
            ],
            [
                'id'=> 2,
                'nom'=>'bu zzz',
                'description'=>'description 2'
            ],
            [
                'id'=> 3,
                'nom'=>'bu byz',
                'description'=>'description 1'
            ],
            [
                'id'=> 4,
                'nom'=>'bu abc',
                'description'=>'description 1'
            ]
        ];

        foreach($bus as $bu){
            Bu::create([
                'id'=>$bu['id'],
                'nom'=>$bu['nom'],
                'description'=>$bu['description']
            ]);
        }
    }
}
