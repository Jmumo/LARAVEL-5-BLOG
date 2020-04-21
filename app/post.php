<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class post extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function comments(){
        return $this->hasMany('App\comments');
    }



    public function scopeFilter($query,$request){

        if($month = request('month')){


            $query->whereMonth('created_at',carbon::parse($month)->month);

        }

        if($year = request('year')){

            $query->whereYear('created_at',$year);
        }

    }

    public function scopeArchives($query){

        return $query->selectRAW('year(created_at)year,monthname(created_at)month,count(*)published')
            ->groupBy('year','month')
            ->orderbyRAW('min(created_at)desc')
            ->get()
            ;
    }

    public function scopeRecent($query){

        return $query->orderby('created_at', 'desc')->take(3)->get();
    }

}
