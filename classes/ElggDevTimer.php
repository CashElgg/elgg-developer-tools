<?php
/**
 * Elgg Timer
 *
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 */

class ElggDevTimer {

	protected $id = '';
	protected $startTime   = 0;
	protected $elapsedTime = 0;
	protected $numberCalls = 0;

	/**
	 * ElggDevTimer constructor
	 *
	 * @param string $id    Identifier of the timer
	 * @param bool   $start Whether to start the timer
	 */
	public function __construct($id = '', $start = false) {
		$this->id = $id;
		if ($start) {
			$this->start();
		}
	}

	/**
	 * Starts the timer
	 */
	public function start() {
		$this->startTime = microtime(true);
		$this->numberCalls += 1;
	}

	/**
	 * Stops the timer
	 *
	 * @return float Time in this call in seconds
	 */
	public function stop() {
		if ($this->startTime == 0) {
			return 0;
		}
		$elapsed = microtime(true) - $this->startTime;
		$this->elapsedTime += $elapsed;
		$this->startTime = 0;
		return $elapsed;
	}

	/**
	 * Get the total time this timer has been running
	 *
	 * @warning stops the timer if currently running
	 *
	 * @return float Total time in seconds
	 */
	public function getElapsedTime() {
		if ($this->startTime != 0) {
			$this->stop();
		}
		return $this->elapsedTime;
	}

	/**
	 * Get the number of start/stop cycles
	 *
	 * @return int
	 */
	public function getCalls() {
		return $this->numberCalls;
	}

	/**
	 * Get the average amount of time per call
	 *
	 * @return float
	 */
	public function getAverageCallTime() {
		return $this->elapsedTime / $this->numberCalls;
	}
}
