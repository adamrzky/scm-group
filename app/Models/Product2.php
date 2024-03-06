<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product2 extends Model
{
    use HasFactory;
    protected $table = 'products2';
    
    // public function customer(){
    //     return $this->belongsTo(Customer::class,'customer_id','id');
    // } 

    protected $primaryKey = 'id'; // Menentukan kunci utama

    protected $fillable = [
        'SLoc',
        'MaterialNo',
        'MaterialDesscription', // Mungkin ada typo di sini? Haruskah 'Description'?
        'Qty',
        'Uom',
        'SystemBatch',
        'VendorBatch',
        // 'created_by',
        // 'updated_by',
        // 'created_at',
        // 'updated_at',
    ];

}
