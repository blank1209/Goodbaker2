<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Supplier::create([
            'supplierName' => 'a'
        ]);

        Supplier::create([
            'supplierName' => 'b'
        ]);
    }
}
