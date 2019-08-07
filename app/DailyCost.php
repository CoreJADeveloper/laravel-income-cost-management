<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyCost extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'daily_costs';

  protected $fillable = ['cost_type', 'amount', 'comment'];

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
