<?php

declare(strict_types=1);

use Lark\Entity;

require_once '../vendor/autoload.php';

class UserLocation extends Entity
{
	public function __construct(
		public string $city
	)
	{
	}
};

class User extends Entity
{
	public function __construct(
		public string $name,
		public int $age,
		public UserLocation $location,
		public ?User $friend = null
	)
	{
	}
}

$user = new User(
	name: 'Bob',
	age: 30,
	location: new UserLocation(city: 'Tampa'),
	friend: new User(
		name: 'Alice',
		age: 25,
		location: new UserLocation(city: 'Miami')
	)
);

assert($user->name === 'Bob');
assert($user->age === 30);
assert($user->location->city === 'Tampa');
assert($user->friend->name === 'Alice');
assert($user->friend->location->city === 'Miami');

$userArray = $user->toArray();
assert($userArray['name'] === 'Bob');
assert($userArray['age'] === 30);
assert($userArray['location']['city'] === 'Tampa');
assert($userArray['friend']['name'] === 'Alice');
assert($userArray['friend']['location']['city'] === 'Miami');


class UserLocation2 extends Entity
{
	public string $city;
};

class User2 extends Entity
{
	public string $name;
	public int $age;
	public UserLocation2 $location;
	public ?User2 $friend = null;
}

$userData = [
	'name' => 'Bob',
	'age' => 30,
	'location' => [
		'city' => 'Tampa'
	],
	'friend' => [
		'name' => 'Alice',
		'age' => 25,
		'location' => [
			'city' => 'Miami'
		]
	]
];

$user2 = new User2($userData);

assert($user2->name === 'Bob');
assert($user2->age === 30);
assert($user2->location->city === 'Tampa');
assert($user2->friend->name === 'Alice');
assert($user2->friend->location->city === 'Miami');

$userArray2 = $user2->toArray();
assert($userArray2['name'] === 'Bob');
assert($userArray2['age'] === 30);
assert($userArray2['location']['city'] === 'Tampa');
assert($userArray2['friend']['name'] === 'Alice');
assert($userArray2['friend']['location']['city'] === 'Miami');

echo 'OK';
