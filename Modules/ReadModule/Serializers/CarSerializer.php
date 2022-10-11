<?php

namespace Modules\ReadModule\Serializers;

use Modules\ReadModule\Serializers\Base\BaseSerializer;

class CarSerializer extends BaseSerializer
{
    public static function serializeObject(?object $car_object_data): array
    {
        $person_data = null;
        
        if (!empty($car_object_data->person_id)) {
            $person_data = [
                'id'=>$car_object_data->person_id,
                'name'=>$car_object_data->person_name,
                'phone'=>$car_object_data->person_phone
            ];
        }
        
        return [
            'car_id'=>$car_object_data->car_id,
            'car_brand'=>$car_object_data->car_brand,
            'car_model'=>$car_object_data->car_model,
            'car_color'=>$car_object_data->car_color,
            'car_number'=>$car_object_data->car_number,
            'person'=>$person_data
        ];
    }
}
