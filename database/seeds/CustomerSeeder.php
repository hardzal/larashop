<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_customer = new \App\User();
        $new_customer->username = "Siaka";
        $new_customer->name = "Anna";
        $new_customer->email = "anna@gmail.com";
        $new_customer->roles = json_encode(["CUSTOMER"]);
        $new_customer->password = \Hash::make("543210");
        $new_customer->phone = "087781381201";
        $new_customer->avatar = "";
        $new_customer->address = "Kota Illios";

        $new_customer->username = "Ilynyahaha";
        $new_customer->name = "Ily";
        $new_customer->email = "siily@gmail.com";
        $new_customer->roles = json_encode(["CUSTOMER"]);
        $new_customer->password = \Hash::make("1234560");
        $new_customer->phone = "09231484192";
        $new_customer->avatar = "";
        $new_customer->address = "Bulan";

        $new_customer->save();

        $this->command->info("Berhasil membuat customer");
    }
}
