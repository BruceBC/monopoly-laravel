<?php

namespace Database\traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Insertable
{
    /**
     * Inserts a record and applies timestamps by default.
     *
     * @param string $table
     * @param array  $records
     * @param bool   $timestamp
     */
    public function insert($table, $records, $timestamp = true)
    {
        $timestamps = [
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];

        // Check if multidimensional
        $isMulti = count(array_filter($records, 'is_array')) > 0;

        $collection = $records;

        // Map through records and apply timestamps
        if ($timestamp && $isMulti) {
            $collection = array_map(function ($record) use ($timestamps, $timestamp) {
                return array_merge($record, $timestamp ? $timestamps : []);
            }, $records);
        }

        // Insert records
        DB::table($table)->insert($collection);
    }
}
