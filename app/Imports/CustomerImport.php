<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomerImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($rows as $row)
        {
            $customer = Customer::where('email', $row['email'])->first();
            if($customer){

                $customer->update([
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                ]);

            }else{

                Customer::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                ]);
            }

        }
    }
}


