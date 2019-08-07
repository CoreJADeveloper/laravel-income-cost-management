<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'salaries';

  protected $fillable = ['employee_name', 'amount', 'comment'];

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
