# Documentação 

**Namespace** - Validator

## Functions

| Function | Param | Return | Description |
| --- | --- | --- | --- |
| name | String | - | Captures the object key and stores it in $name |
| value | String or Interger | - | captures the object key and stores it in $value |
| is_numeric | - | string if false | checks if it is numeric otherwise it returns an error message |
| is_string | - | string if false | checks if it is string otherwise it returns an error message |
| is_number | - | string if false | checks if it is number otherwise it returns an error message |
| ranger | Integer | string if the condition is false | checks if the number of characters matches |
| no_space | - | string if the condition is false | make sure you have space |
| getErrors | - | Array with erros | returns errors |
| success | - | Bool | returns if contains error |

### Use

  ```php
    require '/path/Validator.php';
    $name = 'age';
    $value = 123;

    // $validator is the instance of Validator()
    
    $validator->name($name)->value($value)->is_numeric();

    if ($validator->success()) {
      /// True
    } else {
      /// False
      print_r($validator->getErrors())
    }
  ```