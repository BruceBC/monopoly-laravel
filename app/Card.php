<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['rule', 'action'];

  /**
   * Get the game that owns the cards.
   *
   * @return BelongsTo
   */
  public function game()
  {
    return $this->belongsTo(Game::class);
  }

  /**
   * Get the payment cards for the card.
   *
   * @return HasMany
   */
  public function paymentCards()
  {
    return $this->hasMany(PaymentCard::class);
  }

  /**
   * Get the collection cards for the card.
   *
   * @return HasMany
   */
  public function collectionCards()
  {
    return $this->hasMany(CollectionCard::class);
  }

  /**
   * Get the collect per player cards for the card.
   *
   * @return HasMany
   */
  public function collectPerPlayerCards()
  {
    return $this->hasMany(CollectPerPlayerCard::class);
  }

  /**
   * Get the pay per player cards for the card.
   *
   * @return HasMany
   */
  public function payPerPlayerCards()
  {
    return $this->hasMany(PayPerPlayerCard::class);
  }

  /**
   * Get the repair cards for the card.
   *
   * @return HasMany
   */
  public function repairCards()
  {
    return $this->hasMany(RepairCard::class);
  }

  /**
   * Get the retreat cards for the card.
   *
   * @return HasMany
   */
  public function retreatCards()
  {
    return $this->hasMany(RetreatCard::class);
  }

  /**
   * Get the advance go cards for the card.
   *
   * @return HasMany
   */
  public function advanceGoCards()
  {
    return $this->hasMany(AdvanceGoCard::class);
  }

  /**
   * Get the advance street cards for the card.
   *
   * @return HasMany
   */
  public function advanceStreetCards()
  {
    return $this->hasMany(AdvanceStreetCard::class);
  }

  /**
   * Get the advance railroad cards for the card.
   *
   * @return HasMany
   */
  public function advanceRailroadCards()
  {
    return $this->hasMany(AdvanceRailroadCard::class);
  }

  /**
   * Get the advance utility cards for the card.
   *
   * @return HasMany
   */
  public function advanceUtilityCards()
  {
    return $this->hasMany(AdvanceUtilityCard::class);
  }
}
