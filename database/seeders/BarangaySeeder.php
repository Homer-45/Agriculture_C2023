<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barangay;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $barangays = 
        [
            ["brgy_name"     =>  "A. Bonifacio"],
            ["brgy_name"     =>  "Abad Santos"],
            ["brgy_name"     =>  "Aguinaldo"],
            ["brgy_name"     =>  "Antipolo"],
            ["brgy_name"     =>  "Bical"],
            ["brgy_name"     =>  "Beguin"],
            ["brgy_name"     =>  "Bonga"],
            ["brgy_name"     =>  "Butag"],
            ["brgy_name"     =>  "Cadandanan"],
            ["brgy_name"     =>  "Calomagon"],
            ["brgy_name"     =>  "Calpi"],
            ["brgy_name"     =>  "Cocok-Cabitan"],
            ["brgy_name"     =>  "Daganas"],
            ["brgy_name"     =>  "Danao"],
            ["brgy_name"     =>  "Dolos"],
            ["brgy_name"     =>  "E. Quirino"],
            ["brgy_name"     =>  "Fabrica"],
            ["brgy_name"     =>  "G. Del Pilar"],
            ["brgy_name"     =>  "Gate"],
            ["brgy_name"     =>  "Inararan"],
            ["brgy_name"     =>  "J. Gerona"],
            ["brgy_name"     =>  "J.P. Laurel"],
            ["brgy_name"     =>  "Jamorawon"],
            ["brgy_name"     =>  "Libertad"],
            ["brgy_name"     =>  "Lajong"],
            ["brgy_name"     =>  "Magsaysay"],
            ["brgy_name"     =>  "Managa-naga"],
            ["brgy_name"     =>  "Marinab"],
            ["brgy_name"     =>  "Montecalvario"],
            ["brgy_name"     =>  "Nasuje"],
            ["brgy_name"     =>  "N. Roque"],
            ["brgy_name"     =>  "Namo"],
            ["brgy_name"     =>  "Obrero"],
            ["brgy_name"     =>  "Osmeña"],
            ["brgy_name"     =>  "Otavi"],
            ["brgy_name"     =>  "Padre Diaz"],
            ["brgy_name"     =>  "Palale"],
            ["brgy_name"     =>  "Quezon(Cabarawan)"],
            ["brgy_name"     =>  "R. Gerona"],
            ["brgy_name"     =>  "Recto"],
            ["brgy_name"     =>  "Roxas(Busay)"],
            ["brgy_name"     =>  "Sagrada"],
            ["brgy_name"     =>  "San Francisco"],
            ["brgy_name"     =>  "San Isidro"],
            ["brgy_name"     =>  "San Juan Bag-o"],
            ["brgy_name"     =>  "San Juan Daan"],
            ["brgy_name"     =>  "San Rafael"],
            ["brgy_name"     =>  "San Ramon"],
            ["brgy_name"     =>  "San Vicente"],
            ["brgy_name"     =>  "Santa Remedios"],
            ["brgy_name"     =>  "Santa Teresita"],
            ["brgy_name"     =>  "Sigad"],
            ["brgy_name"     =>  "Somagongsong"],
            ["brgy_name"     =>  "Tarhan"],
            ["brgy_name"     =>  "Taromata"],
            ["brgy_name"     =>  "Zone 1"],
            ["brgy_name"     =>  "Zone 2"],
            ["brgy_name"     =>  "Zone 3"],
            ["brgy_name"     =>  "Zone 4"],
            ["brgy_name"     =>  "Zone 5"],
            ["brgy_name"     =>  "Zone 6"],
            ["brgy_name"     =>  "Zone 7"],
            ["brgy_name"     =>  "Zone 8"],

        ];

        foreach ($barangays as $barangay) {
            DB::table('barangays')->insert($barangay);
        }
    }
}
