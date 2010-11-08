<?php
/**
 * Elgg Timer Manager
 *
 * Inspired by symfony sfTimerManager
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 */

class ElggDevTimerManager {
	static public $timers = array();

	/**
	 * Get a timer object or create it if it doesn't exist
	 *
	 * @param string $id    Identifier for the timer
	 * @param bool   $start Whether to start the timer
	 * @return ElggDevTimer
	 */
	public static function getTimer($id, $start = false) {
		if (!isset(self::$timers[$id])) {
			self::$timers[$id] = new ElggDevTimer($id, $start);
			return self::$timers[$id];
		}
		if ($start) {
			self::$timers[$id]->start();
		}
		return self::$timers[$id];
	}

	/**
	 * Get all timers
	 *
	 * @return array of ElggDevTimer instances
	 */
	public static function getTimers() {
		return self::$timers;
	}

	/*
	 * Clear all timers
	 */
	public static function clearTimers() {
		self::$timers = array();
	}
}