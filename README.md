# Lark Entity

The Entity class is used to simplify creating data classes, creating class properties from an array and creating an array from class properties.

```php
use Lark\Entity;

// class must be subclass of Entity
class Location extends Entity
{
    public string $address;
    public string $city;
}

class User extends Entity
{
    // properties must be public and typed
    // union types are not supported
    public string $name;
    public int $age;
    public bool $isActive = false; // default values
    public Location $location; // deep nested classes supported
}

// populate from array
$user = new User([
    'name' => 'Bob',
    'age' => 25,
    'location' => [
        'address' => '101 main',
        'city' => 'Tampa'
    ]
]);
// or use: $user->fromArray([...])

echo $user->name; // Bob
echo $user->location->address; // 101 main

// get as array
$userArr = $user->toArray(); // [name => Bob, ...]
```
