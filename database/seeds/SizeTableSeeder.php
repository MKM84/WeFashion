<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            [
            'name' => 'XL',
            ],
            [
                'name' => 'L',
            ],
                [
                    'name' => 'M',
                ],
                    [
                        'name' => 'XL',
                    ],
                        [
                            'name' => 'XS',
                        ],
            ]);
    }
}
