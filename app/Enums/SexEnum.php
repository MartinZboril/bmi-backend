<?php
  
namespace App\Enums;

use App\Traits\ManagesEnumValues;
 
enum SexEnum: string
{
    use ManagesEnumValues;
    
    case Male = 'male';
    case Female = 'female';
}