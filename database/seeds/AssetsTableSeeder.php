<?php

use App\Asset;
use App\Team;
use Illuminate\Database\Seeder;

/**
 * Class AssetsTableSeeder
 */
class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
/*     public function run(): void
    {
        $assets = [
            'gloves',
            'masks',
            'respirators',
            'protective overalls',
            'protective glasses',
        ];

        foreach ($assets as $asset) {
            Asset::factory()->create([
                'name'        => $asset,
                'description' => $asset
            ]);
        }
    }
 */


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Asset::truncate(); */
  
            $report = fopen(base_path("database\data\mar_2022_assets.csv"), "r");
    
            $dataRow = true;
            while (($data = fgetcsv($report, 4000, ",")) !== FALSE) {
                if (!$dataRow) {
                try{
                    Asset::create([
                        'balancete' => $data['1'],
                        'codigo' => $data['2'],
                        'name' => $data['3'],
                        'description' =>  $data['4'],
                        'danger_level' => $data['8'],
                    ]); 
                }catch ( Throwable  $e){

                
                }   
                }
                $dataRow = false;
            }
   
        fclose($report);
    }
}
