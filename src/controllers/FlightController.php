<?php


require_once 'AppController.php';
require_once __DIR__ . '/../models/Flight.php';
require_once __DIR__ . '/../repository/FlightRepository.php';

class FlightController extends AppController
{

    private $flightRepository;

    private function flightsMap(): array
    {
        $holdFlights = $this->flightRepository->getFlightsByState('hold');
        $approachFlights = $this->flightRepository->getFlightsByState('approach');
        $departureFlights = $this->flightRepository->getFlightsByState('departure');
        $onStandFlights = $this->flightRepository->getFlightsByState('onStand');
        $taxiFlights = $this->flightRepository->getFlightsByState('taxi');
        $runwayFlights = $this->flightRepository->getFlightsByState('runway');

        return [
            'hold' => $holdFlights,
            'approach' => $approachFlights,
            'departure' => $departureFlights,
            'onStand' => $onStandFlights,
            'taxi' => $taxiFlights,
            'runway' => $runwayFlights
        ];
    }

    public function __construct()
    {
        parent::__construct();
        $this->flightRepository = new FlightRepository();
    }

    public function atc()
    {
        if (!$this->isPost()) {
            return $this->render('atc', $this->flightsMap());
        }
    }

    public function addFlight()
    {
        if (!$this->isPost()) {
            return $this->render('new_flight');
        } else {
            $this->flightRepository->addFlight($_POST['flightInfo'], 'hold');
            return $this->render('atc', $this->flightsMap());
        }
    }

    public function updateFlight(int $id)
    {
        print_r($_POST);
        if ($this->isPost()) {
            $newState = $_POST['newState'];
            $this->flightRepository->updateState($id, $newState);
        }
    }

    public function deleteFlight(int $id)
    {
        if (!$this->isPost()) {
            return $this->render('atc', $this->flightsMap());
        } else {
            $this->flightRepository->deleteFlightById($id);
            return $this->render('atc', $this->flightsMap());
        }
    }
}