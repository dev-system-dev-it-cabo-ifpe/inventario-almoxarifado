<?php


use App\Stock;
use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Asset::truncate(); */
            $report = fopen(base_path("database\data\mar_2022_stocks.csv"), "r");
    
            $dataRow = true;
            
            while (($data = fgetcsv($report, 4000, ",")) !== FALSE) {
                if (!$dataRow) {
                
                    Stock::create([
                        'inventario_stock' => $data['1'],
                        'suap_stock' => $data['2'],
                        'data_inventario' => $data['3'],
                        'data_suap' => $data['4'],
                        'current_stock' =>  $data['5'],
                        'current_suap_stock' => $data['6'],
                        'asset_id'  => $data['10'],
                        'team_id' => $data['11']
                   ]); 
                   
                }
                $dataRow = false;
            }
        echo("Close");   
   
        fclose($report);
    }
}
