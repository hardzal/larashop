<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User();
        $administrator->username = "Administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("larashop");
        $administrator->phone = "087781381201";
        $administrator->avatar = "default.png";
        $administrator->address = "Pakulaman, Kota Yogyakarta, DIY";
        
        $administrator->save();

        $this->command->info("User admin berhasil dibuat");
    }
}
