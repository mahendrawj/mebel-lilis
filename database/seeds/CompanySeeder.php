<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name_company' => 'Toko Mebel Lilis',
            'photo' => 'foto-mebellilis.jpg',
            'content_company' => 'Mebel Lilis berdiri sejak tahun 2017. Berlokasi di jalan raya patemon dan mampu bersaing dengan bisnis -bisnis lainnya pada area patemon.
            Melalui jasa andalannya yaitu mebel yang berasal dari diri sendiri mampu memberikan kepuasan untuk seluruh pelanggan setianya'
            
        ]);
        $from = database_path() . DIRECTORY_SEPARATOR . 'seeds' .
        DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
        $to = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
        File::copy($from . 'foto-mebellilis.jpg', $to . 'foto-mebellilis.jpg');
    }
}
