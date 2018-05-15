<?php namespace moonconsultancy\Registration;


class Registrations {
    private $registrations = [];

    /**
     * creates registrations
     *
     * @param $registrations
     * @throws \Exception
     */
    public function __construct($registrations)
    {
        try {
            $this->registrations = $registrations;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * returns registrations
     *
     * @return array
     */
    public function getRegistrations()
    {
        return $this->registrations;
    }
}