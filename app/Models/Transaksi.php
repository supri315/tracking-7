<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Transaksi extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'date',
        'awb',
        'shipper',
        'shipper_address',
        'shipper_phone',
        'receiver',
        'receiver_address',
        'kelurahan',
        'kecamatan',
        'phone_receiver',
        'coli_total',
        'weight_total',
        'volume_total',
        'code',
        'shipping_amount',
        'discount',
        'total_amount',
        'ship_date',
        'source_branch_id',
        'destination_branch_id',
        'disctric_id'
    ];

    public function scopeGetAll($query) {
        return $query
        ->select([
             "transaction.id",
             "transaction.awb",
             "transaction.shipper",
             "transaction.shipper_address",
             "transaction.shipper_phone",
             "transaction.receiver",
             "transaction.receiver_address",
             "transaction.kelurahan",
             "transaction.kecamatan",
             "transaction.phone_receiver",
             "transaction.coli_total",
             "transaction.weight_total",
             "transaction.volume_total",
             "transaction.code",
             "transaction.shipping_amount",
             "transaction.discount",
             "transaction.total_amount",
             "transaction.ship_date",
             "transaction.source_branch_id",
             "transaction.destination_branch_id",

             \DB::raw("(select name from city where id = (select city_id from branch where id = transaction.source_branch_id))  as cabang")
        ]);
        // ->join('branch', 'branch.id','=','transaction.branch_id');
     }
}


// \DB::select