<?php
namespace Model;

class Post {
    public int $userId;
    public int $id;
    public string $title;
    public string $body;

    public function __construct($data = []) {
        $this->userId = $data["userId"];
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->body = $data["body"];
    }
}