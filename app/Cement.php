<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cement extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'cements';

  protected $fillable = ['total_amount', 'rate', 'price', 'customer_name', 'customer_id', 'brand', 'due_no'];

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
