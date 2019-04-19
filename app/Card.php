<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
   * Get the payment card for the card.
   *
   * @return HasOne
   */
  public function paymentCard()
  {
    return $this->hasOne(PaymentCard::class);
  }

  /**
   * Get the collection card for the card.
   *
   * @return HasOne
   */
  public function collectionCard()
  {
    return $this->hasOne(CollectionCard::class);
  }

  /**
   * Get the collect per player card for the card.
   *
   * @return HasOne
   */
  public function collectPerPlayerCard()
  {
    return $this->hasOne(CollectPerPlayerCard::class);
  }

  /**
   * Get the pay per player card for the card.
   *
   * @return HasOne
   */
  public function payPerPlayerCard()
  {
    return $this->hasOne(PayPerPlayerCard::class);
  }

  /**
   * Get the repair card for the card.
   *
   * @return HasOne
   */
  public function repairCard()
  {
    return $this->hasOne(RepairCard::class);
  }

  /**
   * Get the retreat card for the card.
   *
   * @return HasOne
   */
  public function retreatCard()
  {
    return $this->hasOne(RetreatCard::class);
  }

  /**
   * Get the advance go card for the card.
   *
   * @return HasOne
   */
  public function advanceGoCard()
  {
    return $this->hasOne(AdvanceGoCard::class);
  }

  /**
   * Get the advance street card for the card.
   *
   * @return HasOne
   */
  public function advanceStreetCard()
  {
    return $this->hasOne(AdvanceStreetCard::class);
  }

  /**
   * Get the advance railroad card for the card.
   *
   * @return HasOne
   */
  public function advanceRailroadCard()
  {
    return $this->hasOne(AdvanceRailroadCard::class);
  }

  /**
   * Get the advance utility card for the card.
   *
   * @return HasOne
   */
  public function advanceUtilityCard()
  {
    return $this->hasOne(AdvanceUtilityCard::class);
  }
}
