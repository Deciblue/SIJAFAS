<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class WorkOrder extends Model
{

    use HasFactory;



    protected $fillable = [

        'damage_report_id',

        'technician_id',

        'status',

        'notes',

    ];





    public function damageReport()
    {

        return $this->belongsTo(
            DamageReport::class
        );

    }





    public function technician()
    {

        return $this->belongsTo(
            User::class,
            'technician_id'
        );

    }



}