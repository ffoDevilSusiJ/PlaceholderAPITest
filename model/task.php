<?php

class Task {
    public int $id;
    public int $userId;
    public string $title;
    public bool $completed;

    public function __construct($data = []) {
        $this->id = $data["id"];
        $this->userId = $data["userId"];
        $this->title = $data["title"];
        $this->completed = $data["completed"];
                                                                                                                                                                                                                                                    }
   
}