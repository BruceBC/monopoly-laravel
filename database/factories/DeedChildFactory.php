<?php

namespace Database\factories;

use App\Game;
use Database\traits\Definable;
use Database\traits\Insertable;

class DeedChildFactory
{
    use Insertable, Definable;

    protected $table;

    protected $file;

    protected $brand;

    protected $deedType;

    public function __construct($table, $file, $brand, $deedType)
    {
        $this->table    = $table;
        $this->file     = $file;
        $this->brand    = $brand;
        $this->deedType = $deedType;
    }

    public function create()
    {
        $data = $this->definition($this->file);

        $game = Game::where('brand', $this->brand)->first();

        $spaces = $game->spaces->where('tile', 'deed')->filter(function ($space) {
            return $space->deedSpace->deed == $this->deedType;
        });

        $collection = collect($spaces)->map(function ($space) use ($data) {
            return array_merge($data[$this->brand][$space->deedSpace->tag], [
        'deed_id' => $space->deedSpace->id,
      ]);
        });

        $this->insert($this->table, $collection->toArray());

        return $this;
    }
}
