<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    } 

    public function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }
 
      public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

      public function product2(){
        return $this->belongsTo(Product2::class,'product_id','id');
    }
 

     public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
 
     public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

     public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

     public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }



}
 