<?php


require_once 'Repository.php';
require_once __DIR__ . '/../models/Flight.php';

class FlightRepository extends Repository
{

    public function getFlightsByState(string $state): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM flights WHERE state = :state;
        ');
        $stmt->bindParam(':state', $state);
        $stmt->execute();

        $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($flights as $flight) {
            $result[] = new Flight(
                $flight['flightInfo'],
                $flight['state'],
                $flight['flightID']
            );
        }

        return $result;
    }

    public function updateState(int $id, string $newState): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE flights SET state = :state WHERE "flightID" = :id
        ');
        $stmt->bindParam(':state', $newState, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function addFlight(string $info, string $state): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO flights ("flightInfo", state) VALUES (?, ?)
        ');
        $stmt->execute([
            $info,
            $state
        ]);
    }

    public function deleteFlightById(int $id): void
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM flights WHERE "flightID" = :id
        ');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}