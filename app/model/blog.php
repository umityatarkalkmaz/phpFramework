<?php

class blog extends Model
{
    public function allDemo(){
        return self::select('demo')->all();
    }
    public function firstDemo(){
        return self::select('demo')->first();
    }
}