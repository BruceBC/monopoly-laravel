<?php

namespace Database\Traits;

use Illuminate\Database\Schema\Blueprint;

trait Migratable
{
    /**
     * @param Blueprint $table
     * @param array $args
     * @param array $cascade
     */
    public function makeForeign($table, $args, $cascade = ['cascade', 'cascade'])
    {
        [$foreign_id, $ref_id, $ref_table] = $args;
        [$onDelete, $onUpdate]             = $cascade;

        $table
      ->foreign($foreign_id)
      ->references($ref_id)
      ->on($ref_table)
      ->onDelete($onDelete)
      ->onUpdate($onUpdate);
    }
}
