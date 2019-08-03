<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'customers';

  protected $fillable = ['name', 'mobile', 'address', 'national_id', 'bank_name', 'bank_account_number'];

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
