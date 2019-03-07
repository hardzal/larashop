<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_staff = new \App\User();
        $new_staff->username = "StaffEco";
        $new_staff->name = "Marokah";
        $new_staff->email = "simarokah@gmail.com";
        $new_staff->roles = json_encode(["STAFF"]);
        $new_staff->password = \Hash::make("543210");
        $new_staff->phone = "087781381201";
        $new_staff->avatar = "";
        $new_staff->address = "Kota Illios";

        $new_staff->save();

        $new_staff = new \App\User();

        $new_staff->username = "Raibpehaha";
        $new_staff->name = "Raib";
        $new_staff->email = "raibs@gmail.com";
        $new_staff->roles = json_encode(["STAFF"]);
        $new_staff->password = \Hash::make("0213041");
        $new_staff->phone = "0213140112";
        $new_staff->avatar = "";
        $new_staff->address = "Bulan";

        $new_staff->save();

        $this->command->info("Successfully created staff users");
    }
}
