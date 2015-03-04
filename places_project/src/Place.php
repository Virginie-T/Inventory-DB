<?php

    class Place
    {
        private $city;
        private $trip_duration;
        private $image_path;

        function __construct($new_city, $new_trip_duration, $new_image_path)
        {
            $this->city = $new_city;
            $this->trip_duration = $new_trip_duration;
            $this->image_path = $new_image_path;
        }

        function getCity()
        {
            return $this->city;
        }

        function getTripDuration()
        {
            return $this->trip_duration;
        }

        function getImagePath()
        {
            return $this->image_path;
        }

        function setCity($new_city)
        {
            $this_city = $new_city;
        }

        function setTripDuration($new_trip_duration)
        {
            $this->trip_duration = $new_trip_duration;
        }

        function setImagePath($new_image_path)
        {
            $this->image_path = $new_image_path;
        }

        function save()
        {
            echo $this->city . " " . $this->trip_duration . " " . $this->image_path;
            array_push($_SESSION['place_entries'], $this);
        }

        static function getAll()
        {
            return $_SESSION['place_entries'];
        }

        static function deleteAll()
        {
            $_SESSION['place_entries'] = array();
        }
    }
?>
