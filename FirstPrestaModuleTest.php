<?php 
// Call MyClassTest::main() if this source file is executed directly.
if (!defined('PHPUnit_MAIN_METHOD')) {
	define('PHPUnit_MAIN_METHOD', 'FirstPrestaModuleTest::main');
}

/*===========================================================================*/


require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/Util/CodeCoverage.php';
require_once '/var/www/prestashop/modules/firstPrestaModule/firstPrestaModule.php';

class FirstPrestaModuleTest extends PHPUnit_Framework_TestCase {
	private $module = null;
	
	public static function main() {
		require_once 'PHPUnit/TextUI/TestRunner.php';
	
		$suite  = new PHPUnit_Framework_TestSuite('FirstPrestaModuleTest');
		$result = PHPUnit_TextUI_TestRunner::run($suite);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 * 
	 * initialize your environment & framework for tests
	 */
	public function setUp(){
		require_once 'config.inc.php'; // nécessaire pour les variable globales 
									   // instanciées par prestashop !!
									   // Sans, $this->name='firstPrestaModule'; produira
									   // un erreur :
									   /**
									    * 
									    * Enter description here ...
									    * @var unknown_type
									    * 
									    * 1) FirstPrestaModuleTest::testShouldHaveAVersion
Use of undefined constant _PS_MAGIC_QUOTES_GPC_ - assumed '_PS_MAGIC_QUOTES_GPC_'
										*
										* si l'on commente l'inti de cette variable c'est OK !
									    */
		$this->module = new firstPrestaModule();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::tearDown()
	 * 
	 * unset & clean the 'Stack' !!!!
	 */
	public function tearDown(){
		unset($this->module);
	}
	
	
	public function testShouldHaveAName(){
		$attributeName = 'firstPrestaModule';
		$this -> assertEquals($attributeName, $this->module->name);
	}
	
	public function testShouldHaveVersion(){
		$attributeVersion = '0.1.0';
		$this -> assertEquals($attributeVersion, $this->module->version);
	}
	
	
	/**
	 * 
	 * assert that the module have a description attribute (prestashop specification)
	 * @todo implement the code into firstPrestaModule.php
	 */

	public function testShouldHaveADescrption(){
		$expected = 'mon premier presta module';
		$this->assertEquals($expected, $this->module->description);
	}
}


/*=========================================================================*/

// Call MyClassTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == 'FirstPrestaModuleTest::main') {
	FirstPrestaModuleTest::main();
}
