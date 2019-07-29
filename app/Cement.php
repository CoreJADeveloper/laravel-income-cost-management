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
