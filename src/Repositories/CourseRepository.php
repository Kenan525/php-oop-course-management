<?php
namespace App\Repositories;

use PDO;

class CourseRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchCourses(): array
    {
        $stmt = $this->pdo->prepare("SELECT kurs.*, kursort.name AS kursort FROM kurs"
            . " JOIN kursort ON kursort.id = kurs.kursort_id");
        $stmt->execute(null);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchCours($id)
    {
        $stmt = $this->pdo->prepare("SELECT kurs.*, fachbereich.name AS fachbereich FROM kurs"
            . " JOIN fachbereich ON fachbereich.id = kurs.fachbereich_id"
            . " WHERE kursnummer = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject();
    }

    public function fetchCoursesByArea($id = ''): array
    {
        $stmt = $this->pdo->prepare("SELECT kurs.*, fachbereich.name AS fachbereich, kursort.name AS kursort FROM kurs"
            . " JOIN fachbereich ON fachbereich.id = kurs.fachbereich_id"
            . " JOIN kursort ON kursort.id = kurs.kursort_id"
            . " WHERE fachbereich.id like :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchCoursesByPlace($id = ''): array
    {
        $stmt = $this->pdo->prepare("SELECT kurs.*, kursort.name AS kursort FROM kurs"
            . " JOIN kursort ON kursort.id = kurs.kursort_id"
            . " WHERE kursort.id like :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllEvents($id): array
    {
        $stmt = $this->pdo->prepare("SELECT kurstermin.*, trainer.nachname AS trainer FROM kurstermin"
            . " JOIN trainer ON trainer.id = kurstermin.trainer_id"
            . " WHERE kursnummer like :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllAttendees($id): array
    {
        $stmt = $this->pdo->prepare("SELECT kurs_teilnehmer.*, teilnehmer.vorname AS vorname, teilnehmer.nachname AS nachname, teilnehmer.email AS email, teilnehmer.geburtsdatum AS geburtsdatum FROM kurs_teilnehmer"
            . " JOIN teilnehmer ON kurs_teilnehmer.teilnehmer_id = teilnehmer.id"
            . " WHERE kurs_teilnehmer.kursnummer like :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllSubjectAreas(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM fachbereich");
        $stmt->execute(null);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllCoursePlaces(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kursort");
        $stmt->execute(null);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
