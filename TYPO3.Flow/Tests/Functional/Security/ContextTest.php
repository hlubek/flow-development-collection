<?php
declare(ENCODING = 'utf-8');
namespace F3\FLOW3\Tests\Functional\Security;

/*                                                                        *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Testcase for context
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class ContextTest extends \F3\FLOW3\Tests\FunctionalTestCase {

	/**
	 * @test
	 */
	public function afterSerializationAndUnserializationContextIsSetToUninitializedAgain() {
		$context = $this->objectManager->get('F3\FLOW3\Security\Context');
		$this->assertFalse($context->isInitialized());
		$mockRequest = $this->getMock('F3\FLOW3\MVC\RequestInterface');
		$context->initialize($mockRequest);
		$this->assertTrue($context->isInitialized());

		$serializedContext = serialize($context);
		$unserializedContext = unserialize($serializedContext);

		$this->assertFalse($unserializedContext->isInitialized());
	}
}
?>