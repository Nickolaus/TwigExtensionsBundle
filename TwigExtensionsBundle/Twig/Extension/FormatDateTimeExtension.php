<?php

namespace Craue\TwigExtensionsBundle\Twig\Extension;

/**
 * Twig Extension to format date, time, and date/time values.
 * @author Christian Raue <christian.raue@gmail.com>
 */
class FormatDateTimeExtension extends \Twig_Extension {

	protected $locale = 'de';
	protected $datetype = \IntlDateFormatter::MEDIUM;
	protected $timetype = \IntlDateFormatter::MEDIUM;

	public function __construct($locale = null, $datetype = null, $timetype = null) {
		if ($locale !== null) {
			$this->locale = $locale;
		}
		if ($datetype !== null) {
			$this->datetype = $datetype;
		}
		if ($timetype !== null) {
			$this->timetype = $timetype;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return 'formatDateTime';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFilters() {
		return array(
			'date' => new \Twig_Filter_Method($this, 'formatDate'),
			'time' => new \Twig_Filter_Method($this, 'formatTime'),
			'datetime' => new \Twig_Filter_Method($this, 'formatDateTime'),
		);
	}

	public function formatDate($value, $locale = null) {
		return $this->getFormattedDateTime($value, $locale, $this->datetype, \IntlDateFormatter::NONE);
	}

	public function formatTime($value, $locale = null) {
		return $this->getFormattedDateTime($value, $locale, \IntlDateFormatter::NONE, $this->timetype);
	}

	public function formatDateTime($value, $locale = null) {
		return $this->getFormattedDateTime($value, $locale, $this->datetype, $this->timetype);
	}

	protected function getFormattedDateTime($value, $locale, $datetype, $timetype) {
		$localeToUse = !empty($locale) ? $locale : $this->locale;
		$formatter = new \IntlDateFormatter($localeToUse, $datetype, $timetype);
		return $formatter->format($value);
	}

}
