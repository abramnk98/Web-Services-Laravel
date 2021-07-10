<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
          1 => 'home',
          2 => 'services',
          3 => 'portfolio',
          4 => 'about',
          5 => 'team',
          6 => 'contact',
        ];

        $status = ['on', 'off'];

        foreach ($pages as $key => $page) {

            $pageObject = new Page;

            $pageObject->name = ucfirst($page);
            $pageObject->link = '/' . $page;
            $pageObject->order = $key;
            $pageObject->status = $status[array_rand($status)];

            $pageObject->save();
        }
    }
}
