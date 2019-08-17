<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankSaving extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'bank_savings';

  protected $fillable = ['bank_account_number', 'amount', 'comment'];

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
