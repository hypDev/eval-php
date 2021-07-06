<?php
session_start();

class AppController {
    private $db = [];

    function __construct() {
        if (!empty($_SESSION['db'])) {
            $this->db = $_SESSION['db'];
        }
    }
    
    public function create($input) {
        if (in_array($input->title, array_column($this->db, "title"))) {
            return $this->db;
        }
        array_push($this->db, $input);
        $_SESSION['db'] = $this->db;
        return $this->db;
    }

    public function reset() {
        $_SESSION['db'] = [];
    }

    public function find($input) {
        if (!$input) {
            usort($this->db, function($a, $b) {
                return strcmp($a["title"], $b["title"]);
            });
            return $this->db;
        }
        $filtered = array_filter($this->db, function($item) use($input) {
            return $item["author"] === $input;
        });
        usort($filtered,function($a, $b) {
            return strcmp($a["title"], $b["title"]);
        });
        return $filtered;
    }

}