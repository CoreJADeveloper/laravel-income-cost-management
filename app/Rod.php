<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rod extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'rods';

  protected $fillable = ['ms_rod', 'total_amount', 'rate', 'price', 'customer_name', 'customer_id', 'brand', 'due_no'];

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
