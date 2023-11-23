<?php

namespace Blmundo\PhpMvcCustomCreation\Controllers;

class EvenNumbersController
{
    public function showForm()
    {
        include __DIR__ . '/../views/evenNumbersView.php';
    }

    public function index()
    {
        $startAt = 0;
        $quantity = 100;
        $order = 'asc';

        if (isset($_GET['start_at']) && $_GET['start_at'] % 2 === 0) {
            $startAt = (int) $_GET['start_at'];
        }
        if (isset($_GET['quantity']) && $_GET['quantity'] > 0) {
            $quantity = (int) $_GET['quantity'];
        }
        if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
            $order = $_GET['order'];
        }

        $evenNumbers = $this->generateEvenNumbers($startAt, $quantity, $order);

        header('Content-Type: application/json');
        echo json_encode($evenNumbers);
    }

    private function generateEvenNumbers($startAt, $quantity, $order)
    {
        $numbers = [];
        for ($i = $startAt, $count = 0; $count < $quantity; $i += 2) {
            $numbers[] = $i;
            $count++;
        }

        if ($order === 'desc') {
            rsort($numbers);
        }
        return $numbers;
    }

    public function checkEven()
    {
        $number = $_POST['number'] ?? null;
        $resultInHTML = '';

        if (is_numeric($number)) {
            if ($number % 2 === 0) {
                $resultInHTML = "<p style='color: green'>Le nombre $number est un nombre pair.</p>";
            } else {
                $resultInHTML = "<p style='color: red'>Le nombre $number est un nombre impair.</p>";
            }
        } else {
            $resultInHTML = "<p class='error'>Veuillez entrer un nombre.</p>";
        }
        return $resultInHTML;
    }
}