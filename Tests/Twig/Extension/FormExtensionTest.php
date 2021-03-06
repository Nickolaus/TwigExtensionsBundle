<?php

namespace Craue\TwigExtensionsBundle\Tests\Twig\Extension;

use Craue\TwigExtensionsBundle\Twig\Extension\FormExtension;

/**
 * @group unit
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2016 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class FormExtensionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var FormatNumberExtension
	 */
	protected $ext;

	protected function setUp() {
		$this->ext = new FormExtension();
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testCloneForm_nullValue() {
		$this->ext->cloneForm(null);
	}

}
