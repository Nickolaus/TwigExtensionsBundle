<?php

namespace Craue\TwigExtensionsBundle\Tests\Twig\Extension;

use Craue\TwigExtensionsBundle\Tests\TwigBasedTestCase;

/**
 * @group integration
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2013 Christian Raue
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
class ArrayHelperExtensionIntegrationTest extends TwigBasedTestCase {

	protected function setUp() {
		parent::setUp();

		// to avoid complaining about inactive "request" scope
		self::$kernel->getContainer()->get('translator')->setLocale('de');
	}

	/**
	 * @dataProvider dataTranslateArray
	 */
	public function testTranslateArray(array $entries, array $parameters, $domain, $locale, $result) {
		$this->assertSame($result,
				$this->getTwig()->render('IntegrationTestBundle:ArrayHelper:translateArray.html.twig', array(
					'entries' => $entries,
					'parameters' => $parameters,
					'domain' => $domain,
					'locale' => $locale,
				)));
	}

	public function dataTranslateArray() {
		return array(
			array(
				array(),
				array(),
				null,
				null,
				'',
			),
// 			array(
// 				array('red', 'green', 'yellow'),
// 				array(),
// 				null,
// 				null,
// 				'red, green, yellow', // would return "rot, grün, gelb" with Symfony >= 2.3 because the domain will default to "messages"
// 			),
			array(
				array('red', 'green', 'yellow'),
				array(),
				'messages',
				'de',
				'rot, grün, gelb',
			),
			array(
				array('thing.red', 'thing.green', 'thing.yellow'),
				array('%thing%' => 'Haus'),
				'messages',
				'de',
				'ein rotes Haus, ein grünes Haus, ein gelbes Haus',
			),
		);
	}

	/**
	 * @dataProvider dataWithout
	 */
	public function testWithout($entries, $without, $result) {
		$this->assertSame($result,
				$this->getTwig()->render('IntegrationTestBundle:ArrayHelper:without.html.twig', array(
					'entries' => $entries,
					'without' => $without,
				)));
	}

	public function dataWithout() {
		return array(
			array(
				array('red', 'green', 'yellow', 'blue'),
				'yellow',
				'red, green, blue',
			),
			array(
				array('red', 'green', 'yellow', 'blue'),
				array('yellow', 'black', 'red'),
				'green, blue',
			),
		);
	}

	/**
	 * @dataProvider dataReplaceKey
	 */
	public function testReplaceKey($entries, $key, $value, $result) {
		$this->assertSame($result,
				$this->getTwig()->render('IntegrationTestBundle:ArrayHelper:replaceKey.html.twig', array(
					'entries' => $entries,
					'key' => $key,
					'value' => $value,
				)));
	}

	public function dataReplaceKey() {
		return array(
			array(
				array('key1' => 'value1', 'key2' => 'value2'),
				'key3',
				'value3',
				'value1, value2, value3',
			),
			array(
				array('key1' => 'value1', 'key2' => 'value2'),
				'key1',
				'value3',
				'value3, value2',
			),
		);
	}

}
