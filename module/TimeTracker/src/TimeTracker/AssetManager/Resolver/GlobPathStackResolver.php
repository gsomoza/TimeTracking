<?php

namespace TimeTracker\AssetManager\Resolver;
use Assetic\Asset\GlobAsset;
use AssetManager\Exception\InvalidArgumentException;
use AssetManager\Resolver\MimeResolverAwareInterface;
use AssetManager\Resolver\ResolverInterface;
use AssetManager\Service\MimeResolver;
use SplFileInfo;
use Traversable;
use Zend\Stdlib\SplStack;


/**
 * This resolver allows you to resolve from a stack of paths.
 */
class GlobPathStackResolver implements ResolverInterface, MimeResolverAwareInterface
{
    /**
     * @var SplStack
     */
    protected $paths;

    /**
     * Flag indicating whether or not LFI protection for rendering view scripts is enabled
     *
     * @var bool
     */
    protected $lfiProtectionOn = true;

    /**
     * The mime resolver.
     *
     * @var MimeResolver
     */
    protected $mimeResolver;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paths = new SplStack();
    }

    /**
     * Set the mime resolver
     *
     * @param MimeResolver $resolver
     */
    public function setMimeResolver(MimeResolver $resolver)
    {
        $this->mimeResolver = $resolver;
    }

    /**
     * Get the mime resolver
     *
     * @return MimeResolver
     */
    public function getMimeResolver()
    {
        return $this->mimeResolver;
    }

    /**
     * Add many paths to the stack at once
     *
     * @param array|Traversable $paths
     */
    public function addPaths($paths)
    {
        foreach ($paths as $path) {
            $this->addPath($path);
        }
    }

    /**
     * Rest the path stack to the paths provided
     *
     * @param  Traversable|array                  $paths
     * @throws InvalidArgumentException
     */
    public function setPaths($paths)
    {
        if (!is_array($paths) && !$paths instanceof Traversable) {
            throw new InvalidArgumentException(sprintf(
                'Invalid argument provided for $paths, expecting either an array or Traversable object, "%s" given',
                is_object($paths) ? get_class($paths) : gettype($paths)
            ));
        }

        $this->clearPaths();
        $this->addPaths($paths);
    }

    /**
     * Normalize a path for insertion in the stack
     *
     * @param  string $path
     * @return string
     */
    protected function normalizePath($path)
    {
        $path = rtrim($path, '/\\');
        $path .= DIRECTORY_SEPARATOR;

        return $path;
    }

    /**
     * Add a single path to the stack
     *
     * @param  string                             $path
     * @throws InvalidArgumentException
     */
    public function addPath($path)
    {
        if (!is_string($path)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid path provided; must be a string, received %s',
                gettype($path)
            ));
        }

        $this->paths[] = $this->normalizePath($path);
    }

    /**
     * Clear all paths
     *
     * @return void
     */
    public function clearPaths()
    {
        $this->paths = new SplStack();
    }

    /**
     * Returns stack of paths
     *
     * @return SplStack
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * Set LFI protection flag
     *
     * @param  bool $flag
     * @return self
     */
    public function setLfiProtection($flag)
    {
        $this->lfiProtectionOn = (bool) $flag;
    }

    /**
     * Return status of LFI protection flag
     *
     * @return bool
     */
    public function isLfiProtectionOn()
    {
        return $this->lfiProtectionOn;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve($name)
    {
        if ($this->isLfiProtectionOn() && preg_match('#\.\.[\\\/]#', $name)) {
            return null;
        }

        if ( strpbrk($name, '[]*?' ) === false) { //skip files that don't look like globs
            return null;
        }

        foreach ($this->getPaths() as $path) {

            $glob = glob($path . $name);
            if(count($glob)) {
                //TODO: this could be refactored into a MimeResolver
                $filePath = current( $glob );
                $file     = new SplFileInfo( $filePath );
                $mimeType = $this->getMimeResolver()->getMimeType( $file->getRealPath() );

                $asset = new GlobAsset($path . $name);
                $asset->mimetype = $mimeType;
                return $asset;
            }
        }

        return null;
    }

}
