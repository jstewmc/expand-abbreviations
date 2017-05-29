<?php
/**
 * The file for the expand-abbreviations service tests
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\ExpandAbbreviations;

use Jstewmc\TestCase\TestCase;

/**
 * Tests for the expand-abbreviations service
 */
class ExpandAbbreviationsTest extends TestCase
{
	/**
	 * __construct() should set the service's properties
	 */
	public function testConstruct()
	{
		$replacements = ['foo' => 'bar'];
		
		$service = new ExpandAbbreviations($replacements);
		
		$this->assertEquals(
			$replacements, 
			$this->getProperty('replacements', $service)
		);
		
		return;
	}
	
	/**
	 * __invoke() should return string if replacements do not exist
	 */
	public function testInvokeReturnsStringIfReplacementsDoNotExit()
	{
		$this->assertEquals('foo', (new ExpandAbbreviations([]))('foo'));
		
		return;
	}
	
	/**
	 * __invoke() should return string if abbreviation does not exist
	 */
	public function testInvokeReturnsStringIfAbbreviationDoesNotExist()
	{
		$replacements = ['foo' => 'bar'];
		
		$service = new ExpandAbbreviations($replacements);
		
		$this->assertEquals('baz', $service('baz'));
		
		return;
	}
	
	/**
	 * __invoke() should return string if abbreviation does exist
	 */
	public function testInvokeReturnsStringIfAbbreviationDoesExist()
	{
		$replacements = ['foo' => 'bar'];
		
		$service = new ExpandAbbreviations($replacements);
		
		$this->assertEquals('bar bar baz', $service('foo bar baz'));
		
		return;
	}
	
	/**
	 * __invoke() should return strin if abbreviation has trailing period
	 */
	public function testInvokeReturnsStringIfAbbreviationHasTrailingPeriod()
	{
		$replacements = ['foo' => 'bar'];
		
		$service = new ExpandAbbreviations($replacements);
		
		$this->assertEquals('bar bar baz', $service('foo. bar baz'));
		
		return;
	}
}
