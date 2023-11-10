<?php
use API\JSONPlaceholderAPI;
use Model\User;
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

$api = new JSONPlaceholderAPI("https://jsonplaceholder.typicode.com/");
$user = $api->getUserById(2);
//Get user
echo "User: " . $api->getUserById(2)->name . "</br>";

//Change name
$user->name = "New Name";
echo "Update name for " . $api->getUserById(2)->name . " => " .  $api->updateUser(2, $user)->name  . "</br>";

//Add user
$user = new User(["name" => "Valeriy Graham", "username" => "Bret", "email" => "Sincere@april.biz", "address" => ["street" => "Kulas Light", "suite" => "Apt. 556", "city" => "Gwenborough", "zipcode" => "92998-3874", 
"geo" => ["lat" => "-37.3159", "lng" => "81.1496"]]]);
echo  "</br>" . "Create new User, new user id: " . $api->addUser($user)->id;

//Get user Tasks and Posts
echo "</br>" ."User 1 tasks: ";
foreach ($api->getTasksByUserId(1) as $value) {
    echo "</br>" .$value->id . ": ";
    echo $value->title . " is ";
    echo $value->completed ? 'completed' : 'uncompleted';
}
echo "</br>" ."\nUser 1 posts: ";
foreach ($api->getPostsByUserId(1) as $value) {
    echo "</br>" ."\n".$value->id . ": ";
    echo $value->title;
}
?>