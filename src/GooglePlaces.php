<?php 

namespace DanielGriffiths;

/**
 * GooglePlaces - A simple Google Places class
 * @package GooglePlaces
 * @author Daniel Griffiths (daniel-griffiths)
 */
class GooglePlaces
{
	/**
	 * Google Places API key.
	 * 
	 * @var string
	 */
	protected $apiKey;

	/**
	 * Property longitude.
	 * 
	 * @var float
	 */
	protected $longitude;

	/**
	 * Property latitude.
	 * 
	 * @var float
	 */
	protected $latitude;

	/**
	 * Radius of the places search.
	 * 
	 * @var int
	 */
	protected $radius = 500;

	/**
	 * Create a new instance.
	 * 
	 * @param string $apiKey  
	 * @return self
	 */
	public function __construct($apiKey)
	{
		$this->apiKey = $apiKey;

		return $this;
	}

	/**
	 * Set the latitude.
	 *  
	 * @param float $latitude  
	 * @return self
	 */
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;

		return $this;
	}

	/**
	 * Set the longitude.
	 *  
	 * @param float $longitude 
	 * @return self
	 */
	public function setLongitude($longitude)
	{
		$this->longitude = $longitude;

		return $this;
	}

	/**
	 * Set the radius.
	 *  
	 * @param int $radius 
	 * @return self
	 */
	public function setRadius($radius)
	{
		$this->radius = $radius;

		return $this;
	}

	/**
	 * Search for neaby places based on the service type.
	 * 
	 * @param  string $type
	 * @return array
	 */
	public function getType($type)
	{
		return json_decode(
			file_get_contents(
				'https://maps.googleapis.com/maps/api/place/nearbysearch/json?' . 
				'&location=' . $this->longitude . ',' . $this->latitude .
				'&radius=' . $this->radius .
				'&type=' . $type .
				'&key=' . $this->apiKey
			)
		)->results;
	}
}