<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type' => 'about',
            ],

            [
                'type' => 'school_management',
            ],
            [
                'type' => 'infrastructure',
            ],
            [
                'type' => 'staff',
            ],
            [
                'type' => 'pay_scale',
            ],
            [
                'type' => 'fee_structure',
            ],
            [
                'type' => 'strength',
            ],
            [
                'type' => 'financial_position',
            ],
            [
                'type' => 'recent_infrastructure_development',
            ],
            [
                'type' => 'other_facilities',
            ],
            [
                'type' => 'health_care',
            ],
            [
                'type' => 'carriculnm_methods',
            ],
            [
                'type' => 'co_carriculum',
            ],
            [
                'type' => 'ptm',
            ],
            [
                'type' => 'ptam',
            ],
            [
                'type' => 'teacher_workshop',
            ],
            [
                'type' => 'conclusion',
            ],
        ];

        foreach($data as $d){
            Content::create($d);
        }


    }
}
