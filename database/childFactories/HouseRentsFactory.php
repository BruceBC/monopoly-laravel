<?php

namespace Database\childFactories;

use App\Game;
use Database\traits\Definable;
use Database\traits\Insertable;

class HouseRentsFactory
{
    use Insertable, Definable;

    protected $table;

    protected $file;

    protected $brand;

    public function __construct($table, $file, $brand)
    {
        $this->table = $table;
        $this->file  = $file;
        $this->brand = $brand;
    }

    public function create()
    {
        $data = $this->definition($this->file);

        $game = Game::where('brand', $this->brand)->first();

        $spaces = $game->spaces
            ->where('tile', 'deed')
            ->filter(function ($space) {
                return $space->deedSpace->deed == 'street';
            });

        $collection = collect($spaces)->map(function ($space) use ($data) {
            $street = $space->deedSpace->streetDeed;

            return array_merge($data[$this->brand][$street->tag], [
                'street_deed_id' => $street->id,
            ]);
        });

        $this->insert($this->table, $collection->toArray());

        return $this;
    }
}
