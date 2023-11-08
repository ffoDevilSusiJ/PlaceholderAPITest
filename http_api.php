<?php 
require_once('model/user.php');
require_once('model/post.php');
require_once('model/task.php');
interface HttpAPI {
    function getAllUsers() : array;
    function getUserById(int $id): User;
    function addUser(User $user): User;
    function updateUser(int $id, $user);

    function getAllPosts(): array;
    function getPostById(int $id): Post;
    function getPostsByUserId(int $id): array;
    function addPost(Post $post): Post;
    function updatePost(int $id, Post $post);

    public function getAllTasks(): array;
    public function getTaskById(int $id): Task;
    public function getTasksByUserId(int $id): array;
    public function addTask(Task $task): Task;
    public function updateTask(int $id, Task $task);
}
