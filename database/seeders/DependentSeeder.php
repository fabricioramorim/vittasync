<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dependent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dependent::truncate();
  
        $csvFile = fopen(base_path("database/data/dependents.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Dependent::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                    'last_name' => $data['2'],
                    'cpf' => $data['3'],
                    'birth_date' => $data['4'],
                    'vaccine_id' => $data['5'],
                    'employee_id' => $data['6'],
                    'unit_id' => $data['7'],
                    'is_active' => $data['8']
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
