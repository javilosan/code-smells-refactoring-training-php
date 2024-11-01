<?php

declare(strict_types=1);

use App\core\CannotReadEmployeesException;
use App\infrastructure\repositories\FileEmployeesRepository;
use PHPUnit\Framework\TestCase;

class FileEmployeeRepositoryTest extends TestCase
{

    /** @test */
    public function fails_when_the_file_does_not_exist(): void
    {
        $employeeRepository = new FileEmployeesRepository("non-existing.file");
        $this->expectException(CannotReadEmployeesException::class);
        $this->expectExceptionMessageMatches("/cannot loadFrom file/");
        $this->expectExceptionMessageMatches("/non-existing.file/");

        $employeeRepository->getAll();
    }

    /** @test */
    public function fails_when_a_date_is_wrongly_formatted(): void
    {
        $path = dirname(__FILE__) . "/../../resources/wrong_data__wrong-date-format.csv";
        $employeeRepository = new FileEmployeesRepository($path);
        $this->expectException(CannotReadEmployeesException::class);
        $this->expectExceptionMessageMatches("/Badly formatted employee birth date in: '2016-01-01'/");

        $employeeRepository->getAll();
    }
}
