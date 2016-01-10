<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LL_REQUEST extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'LL_REQUESTS';

    /**
     * The primaryKey of this table.
     *
     * @var string
     */
     protected $primaryKey = 'id';

     protected $fillable = [
                            'LL_R_EMAIL', 
                            'LL_R_STATE',
                            'LL_R_CITY', 
                            'LL_R_AREA'
                            ];
}
