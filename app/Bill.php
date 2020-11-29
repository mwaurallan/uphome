<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = [
        'customer_name',
        'customer_email',
    ];
    //public function services()
  //  {
    //    return $this->belongsToMany(Service::class)->withPivot(['quantity']);
   // }
    public function services()
    {
        return $this->belongsToMany('App\Service', ' bill_service',
            'order_id', 'product_id')->withPivot(['quantity']);
    }

}
