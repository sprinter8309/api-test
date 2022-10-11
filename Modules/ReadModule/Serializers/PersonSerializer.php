<?php

namespace Modules\ReadModule\Serializers;

use Illuminate\Support\Collection;
use Modules\ReadModule\Serializers\Base\BaseSerializer;

class PersonSerializer extends BaseSerializer
{
    public static function serializeObject(?object $person_object_data): array
    {
        $car_data = null;
        
        if (!empty($person_object_data->car_id)) {
            $car_data = [
                'id'=>$person_object_data->car_id,
                'brand'=>$person_object_data->car_brand,
                'model'=>$person_object_data->car_model,
                'number'=>$person_object_data->car_number
            ];
        }
        
        return [
            'person_id'=>$person_object_data->person_id,
            'person_name'=>$person_object_data->person_name,
            'person_surname'=>$person_object_data->person_surname,
            'person_age'=>$person_object_data->person_age,
            'person_phone'=>$person_object_data->person_phone,
            'car'=>$car_data
        ];
    }
}
