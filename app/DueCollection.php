<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DueCollection extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'due_collections';

  protected $fillable = ['customer_name', 'customer_mobile', 'amount', 'comment'];

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
