<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 6.0',
            'slug' => str_slug('Laravel 6.0'),

        ]);

        Channel::create([
            'name' => 'VueJs',
            'slug' => str_slug('VueJs')
        ]);

        Channel::create([
            'name' => 'ReactJs',
            'slug' => str_slug('ReactJs')
        ]);

        Channel::create([
            'name' => 'AngularJs',
            'slug' => str_slug('AngularJs')
        ]);

        Channel::create([
            'name' => 'Node Js',
            'slug' => Str_slug('Node Js')
        ]);
    }
}
