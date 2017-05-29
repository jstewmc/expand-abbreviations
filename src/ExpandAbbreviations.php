<?php
/**
 * The file for the expand-abbreviations service
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\ExpandAbbreviations;

/**
 * The expand-abbreviations service
 *
 * Given a list of replacements indexed by abbreviation, I'll replace the 
 * abbreviations. Keep in mind, I'm case-sensitive but trailing-period agnostic.
 *
 * @since  0.1.0
 */
class ExpandAbbreviations
{
	/* !Private properties */
	
	/**
	 * @var    string[]  an array of replacements, indexed by abbreviation
	 * @since  0.1.0
	 */
	private $replacements;
	
	
	/* !Magic methods */
	
	/**
	 * Called when the class is constructed
	 *
	 * @param   string[]  $replacements  an array of replacements, indexed by 
	 *     abbreviation (e.g., ["n" => "north", "s" => "south", ...]) 
	 * @since  0.1.0
	 */
	public function __construct(array $replacements)
	{
		$this->replacements = $replacements;
	}
	
	/**
	 * Called when the class is treated like a function
	 *
	 * I'll replace all occurences of an abbreviation, with or without a trailing 
	 * period, with its corresponding replacement. 
	 * 
	 * @param   string  $string  the string to expand
	 * @return  string
	 * @since   0.1.0
	 */
	public function __invoke(string $string): string
	{
		// split the string into words (and abbreviations)
		$words = explode(' ', $string);
		
		// loop through the words
		foreach ($words as &$word) {
			// loop through the replacements
			foreach ($this->replacements as $abbreviation => $replacement) {
				// if the word is an abbreviation, replace it
				if ($word === $abbreviation || $word === $abbreviation . '.') {
					// replace the word
					$word = $replacement;
				}
			}
		}
		
		return implode(' ', $words);
	}
}
