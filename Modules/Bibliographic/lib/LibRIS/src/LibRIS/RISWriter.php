<?php
namespace LibRIS;

/**
 * Class for writing RIS data.
 *
 * General usage:
 *
 * @code
 * <?php
 * use \LibRIS\RISWriter;
 *
 * $writer = new RISWriter();
 *
 * // Write an associative array of records to a string.
 * $str = $writer->writeRecords($records);
 * ?>
 * @endcode
 */
class RISWriter {

	public function __construct() { }


	/**
	 * Write a series of records to a single RIS string.
	 *
	 * @param array $records
	 *  An array in the format generated by RISReader::parseFile()
	 *
	 * @retval string
	 *         The record as a string.
	 */
	public function writeRecords($records) {
		$buffer = array();
		foreach ($records as $record) {
			$buffer[] = $this->writeRecord($record);
		}

		return implode(RISReader::RIS_EOL, $buffer);
	}


	/**
	 * Write a single record as an RIS string.
	 *
	 * The record should be an associative array of tags to values.
	 *
	 * @param array $tags
	 *  An associative array of key => array(value1, value2,...).
	 *
	 * @retval string
	 *         The record as a string.
	 */
	public function writeRecord($tags) {
		$buffer = array();
		$fmt = '%s  - %s';
		$buffer[] = sprintf($fmt, 'TY', $tags['TY'][0]);
		unset($tags['TY']);
		foreach ($tags as $tag => $values) {
			foreach ($values as $value) {
				$buffer[] = sprintf($fmt, $tag, $value);
			}
		}
		$buffer[] = 'ER  - ';

		return implode(RISReader::RIS_EOL, $buffer);
	}
}
