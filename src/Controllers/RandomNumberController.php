<?php

namespace Blmundo\PhpMvcCustomCreation\Controllers;

class RandomNumberController {
    public function show() {
        $number = rand(0, 100);
        header('Content-Type: application/json');
        echo json_encode(['number' => $number]);
    }
}
