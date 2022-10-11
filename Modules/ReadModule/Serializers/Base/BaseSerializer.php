<?php

namespace Modules\ReadModule\Serializers\Base;

use Illuminate\Support\Collection;

abstract class BaseSerializer
{
    public static function serializeList(Collection $object_list)
    {
        $object_list_data = [];
        
        foreach ($object_list as $single_object_data) {
            $object_list_data[] = static::serialize($single_object_data);
        }
        
        return $object_list_data;
    }
    
    public static function serialize(?object $serialize_data) 
    { 
        if (empty($serialize_data)) {
            return [];
        } else {
            return static::serializeObject($serialize_data);
        }
    }
    
    public static function serializeObject(object $serialize_object)
    {
        
    }
}
