<?php


namespace App\core;


interface EmployeeRepository
{
    function getAll(): array;
}