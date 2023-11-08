
# ApiLib

This project provides a set of functions to interact with the JSONPlaceholder API. The API provides fake data for testing and prototyping.

## Functions

### Users

    getAllUsers(): array: Returns an array of all users.
    getUserById(int $id): User: Returns the user with the specified ID.
    addUser(User $user): User: Adds a new user and returns the added user.
    updateUser(int $id, $user): Updates the user with the specified ID.

### Posts

    getAllPosts(): array: Returns an array of all posts.
    getPostById(int $id): Post: Returns the post with the specified ID.
    getPostsByUserId(int $id): array: Returns an array of all posts by the user with the specified ID.
    addPost(Post $post): Post: Adds a new post and returns the added post.
    updatePost(int $id, Post $post): Updates the post with the specified ID.

### Tasks

    getAllTasks(): array: Returns an array of all tasks.
    getTaskById(int $id): Task: Returns the task with the specified ID.
    getTasksByUserId(int $id): array: Returns an array of all tasks by the user with the specified ID.
    addTask(Task $task): Task: Adds a new task and returns the added task.
    updateTask(int $id, Task $task): Updates the task with the specified ID.


### Example

```php
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
```

```html
User: Ervin Howell
Update name for Ervin Howell => New Name

Create new User, new user id: 11
User 1 tasks:
1: delectus aut autem is uncompleted
2: quis ut nam facilis et officia qui is uncompleted
...
User 1 posts:
1: sunt aut facere repellat provident occaecati excepturi optio reprehenderit
2: qui est esse
...

```