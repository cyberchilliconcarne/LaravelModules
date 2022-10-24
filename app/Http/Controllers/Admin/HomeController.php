<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Tasks',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Task',
            'group_by_field'        => 'due_date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '14',
            'group_by_field_format' => 'd.m.Y',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'id'       => '',
                'name'     => '',
                'status'   => 'name',
                'tag'      => 'name',
                'due_date' => '',
            ],
            'translation_key' => 'task',
        ];

        $settings1['data'] = [];
        if (class_exists($settings1['model'])) {
            $settings1['data'] = $settings1['model']::latest()
                ->take($settings1['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings1)) {
            $settings1['fields'] = [];
        }

        $settings2 = [
            'chart_title'           => 'Products',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Product',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '14',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                'name'     => '',
                'price'    => '',
                'category' => 'name',
                'photo'    => '',
            ],
            'translation_key' => 'product',
        ];

        $settings2['data'] = [];
        if (class_exists($settings2['model'])) {
            $settings2['data'] = $settings2['model']::latest()
                ->take($settings2['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings2)) {
            $settings2['fields'] = [];
        }

        $settings3 = [
            'chart_title'        => 'Blog Categories',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\ContentCategory',
            'group_by_field'     => 'slug',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'translation_key'    => 'contentCategory',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'        => 'Blog Tags',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\ContentTag',
            'group_by_field'     => 'slug',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'translation_key'    => 'contentTag',
        ];

        $chart4 = new LaravelChart($settings4);

        return view('home', compact('settings1', 'settings2', 'chart3', 'chart4'));
    }
}
