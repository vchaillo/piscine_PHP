<?php

class House {

	protected function getHouseName() {
		print('House ' . static::getHouseName());
		return;
	}

	protected function getHouseSeat() {
		print(' of ' . static::getHouseSeat());
		return;
	}

	protected function getHouseMotto() {
		print(' : "' . static::getHouseMotto() . '"'. PHP_EOL);
		return;
	}

	public function introduce() {
		self::getHouseName();
		self::getHouseSeat();
		self::getHouseMotto();
		return;
	}

}

?>
