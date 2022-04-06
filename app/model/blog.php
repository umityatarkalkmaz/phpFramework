<?php

class blog extends Model
{
    public function allBlogs(){
        return self::select('blog')->all();
    }
}