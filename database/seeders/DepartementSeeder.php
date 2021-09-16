<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->delete();

        $departements = [
            [
                'id'=> 1,
                'nom'=>'departement xyz',
                'description'=>'description 1',
                'bu_id'=>1
            ],
            [
                'id'=> 2,
                'nom'=>'departement zzz',
                'description'=>'description 2',
                'bu_id'=>2
            ],
            [
                'id'=> 3,
                'nom'=>'departement byz',
                'description'=>'description 1',
                'bu_id'=>3
            ],
            [
                'id'=> 4,
                'nom'=>'departement abc',
                'description'=>'description 1',
                'bu_id'=>4
            ]
        ];

        foreach($departements as $departement){
            Departement::create([
                'id'=>$departement['id'],
                'nom'=>$departement['nom'],
                'description'=>$departement['description'],
                'bu_id'=>$departement['bu_id']
            ]);
        }
    }
}
