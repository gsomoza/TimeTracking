<?php

namespace TimeTracker\Assetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;
use Assetic\Filter\BaseNodeFilter;

/**
 * Precompiles Handlebars templates for use in the Ember.js framework. This filter
 * requires that the npm package ember-precompile be installed. You can find this
 * package at https://github.com/gabrielgrant/node-ember-precompile.
 */
class EmberPrecompileFilter extends BaseNodeFilter
{
	private $emberBin;
	private $nodeBin;
	private $includeBaseDir;

	public function __construct($handlebarsBin = '/usr/bin/ember-precompile', $nodeBin = null)
	{
		$this->emberBin = $handlebarsBin;
		$this->nodeBin = $nodeBin;
	}

	/**
	 * @return boolean
	 */
	public function getIncludeBaseDir() {
		return $this->includeBaseDir;
	}

	/**
	 * Set the --baseDir parameter when precompiling. Helps get correct template names in Windows, for example. The
	 * baseDir will be automatically calculated.
	 *
	 * @author Gabriel Somoza (work@gabrielsomoza.com)
	 *
	 * @param boolean $includeBaseDir
	 */
	public function setIncludeBaseDir( $includeBaseDir = true) {
		$this->includeBaseDir = $includeBaseDir;
	}

	public function filterLoad(AssetInterface $asset)
	{
		$pb = $this->createProcessBuilder($this->nodeBin
			? array($this->nodeBin, $this->emberBin)
			: array($this->emberBin));

		$templateName = basename($asset->getSourcePath());

		$inputDirPath = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('input_dir');
		$inputPath = $inputDirPath.DIRECTORY_SEPARATOR.$templateName;
		$outputPath = tempnam(sys_get_temp_dir(), 'output');

		mkdir($inputDirPath);
		file_put_contents($inputPath, $asset->getContent());

		$pb->add($inputPath)
		   ->add('-f')
		   ->add($outputPath);

		if($this->includeBaseDir) {
			$pb->add('-b')->add($inputDirPath.DIRECTORY_SEPARATOR);
		}

		$process = $pb->getProcess();
		$returnCode = $process->run();

		unlink($inputPath);
		rmdir($inputDirPath);

		if (127 === $returnCode) {
			throw new \RuntimeException('Path to node executable could not be resolved.');
		}

		if (0 !== $returnCode) {
			if (file_exists($outputPath)) {
				unlink($outputPath);
			}
			throw FilterException::fromProcess($process)->setInput($asset->getContent());
		}

		if (!file_exists($outputPath)) {
			throw new \RuntimeException('Error creating output file.');
		}

		$compiledJs = file_get_contents($outputPath);
		unlink($outputPath);

		$asset->setContent($compiledJs);
	}

	public function filterDump(AssetInterface $asset)
	{
	}
}
