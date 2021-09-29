<?php
declare(strict_types=1);

namespace App\Entities;

use App\Entities\Schwierigkeitsgrad;
use App\Repositories\CourseRepository;
use JetBrains\PhpStorm\Pure;

class Course
{
    public int $kursnummer;
    public string $name;
    public string $beschreibung;
    public $beginndatum;
    public string $dauer;
    public $schwierigkeitsgrad_id;
    public $fachbereich_id;
    public $kursort_id;
    public string $fachbereich;
}
