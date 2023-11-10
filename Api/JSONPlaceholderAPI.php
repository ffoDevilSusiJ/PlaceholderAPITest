<?php
namespace Api;
use Utils\CurlHandler;
use Model\Post;
use Model\User;
use Model\Task;

class JSONPlaceholderAPI implements IHttpAPI {
    private String $url;
    private $curl;
    public function __construct(String $url) {
        $this->url = $url;
        $this->curl = new CurlHandler();
    }

    //User Method Section
    public function getAllUsers() : array { 
        $json = $this->curl->get($this->url . "users");
        return $json["body"];
    }
    
    public function getUserById(int $id) : User {
        $json = $this->curl->get($this->url . "users/". $id);

        return new User($json["body"]);
    }
    public function addUser(User $user): User {
        $json = $this->curl->post($this->url . "users", $user);
        $user->id = $json["body"]->id;
        return $user;
    }
    public function updateUser(int $id, $user) {
        $json = $this->curl->put($this->url . "users/". $id, $user);
        if(!$user->id) $user->id = $id;
        return $user;
    }

    //Post Method Section
    public function getAllPosts(): array {
        $json = $this->curl->get($this->url . "posts");
        return $json["body"];
    }
    public function getPostById(int $id) : Post{
        $json = $this->curl->get($this->url . "posts/". $id);
        return new Post($json["body"]);

    }
    public function getPostsByUserId(int $id): array  {
        $json = $this->curl->get($this->url . "posts?userId=". $id);
        return $json["body"];
    }
    public function addPost(Post $post): Post {
        $json = $this->curl->post($this->url . "posts", $post);
        $post->id = $json["body"]->id;
        return $post;
    }
    public function updatePost(int $id, Post $post) {
        $json = $this->curl->put($this->url . "posts/" . $id, $post);
        if(!$post->id) $post->id = $id;
        return $post;
    }

    //Task Method Section
    public function getAllTasks(): array {
        $json = $this->curl->get($this->url . "todos");
        return $json["body"];
    }
    public function getTaskById(int $id) : Task{
        $json = $this->curl->get($this->url . "todos/". $id);
        return new Task($json["body"]);
    }
    public function getTasksByUserId(int $id): array  {
        $json = $this->curl->get($this->url . "todos?userId=". $id);
        return $json["body"];
    }
    public function addTask(Task $task): Task {
        $json = $this->curl->post($this->url . "todos", $task);
        $task->id = $json["body"]->id;
        return $task;
    }
    
    public function updateTask(int $id, Task $task) {
        $json = $this->curl->put($this->url . "todos/" . $id, $task);
        if(!$task->id) $task->id = $id;
        return $task;
    }
}