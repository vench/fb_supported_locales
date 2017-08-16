<?php

namespace VsFbLangList;

class Helper {

	 
		
	private function __construct(){}

	
	/**
	*
	* @return array
	*/
	public static function getListLocaleFb() {
		return require  './list.php';
	}

	/**
	*
	* @return array
	*/
	public static function getListRuCountry() {
		return require  './ru_country.php';
	}


	/**
	* @param string $locale
	* @return array
	*/
	public static function getCountryCodeByLocale($locale) {
		$list = explode('_', $locale);
		return count($list) == 2 ? $list[1] : $list[0];
	}

	/**
	* @return array
	*/
	public static function getRuFbAllowCountry() {
		$localesMap = self::getListLocaleFb();
		$countryMap = self::getListRuCountry();
		$result = [];
		foreach( array_keys($localesMap) as $key) {
			$country = self::getCountryCodeByLocale($key);

			if(isset($countryMap[$country] )) {
				$result[$country] = $countryMap[$country];
			}
		}
		
		return $result;
	}
	 
}

print_r( Helper::getRuFBAllowCountry() );
