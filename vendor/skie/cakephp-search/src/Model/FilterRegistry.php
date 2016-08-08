<?php
/**
 * PlumSearch plugin for CakePHP Rapid Development Framework
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Evgeny Tomenko
 * @since         PlumSearch 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace PlumSearch\Model;

use Cake\Core\App;
use Cake\Core\ObjectRegistry;
use Cake\ORM\Table;
use PlumSearch\Model\Filter\Exception\MissingFilterException;

/**
 * FilterRegistry is a registry for loaded filters
 *
 * Handles loading, constructing  for filter class objects.
 */
class FilterRegistry extends ObjectRegistry
{
    /**
     * The table that this collection was initialized with.
     *
     * @var \Cake\ORM\Table
     */
    protected $_Table = null;

    /**
     * Constructor.
     *
     * @param \Cake\ORM\Table $Table Table instance.
     */
    public function __construct(Table $Table = null)
    {
        if ($Table) {
            $this->_Table = $Table;
        }
    }

    /**
     * Resolve a filter class name.
     *
     * Part of the template method for Cake\Core\ObjectRegistry::load()
     *
     * @param  string       $class Partial class name to resolve.
     * @return string|false Either the correct class name or false.
     */
    protected function _resolveClassName($class)
    {
        $result = App::className($class, 'Model/Filter', 'Filter');
        if ($result || strpos($class, '.') !== false) {
            return $result;
        }

        return App::className('PlumSearch.' . $class, 'Model/Filter', 'Filter');
    }

    /**
     * Throws an exception when a filter is missing.
     *
     * Part of the template method for Cake\Core\ObjectRegistry::load()
     *
     * @param  string                                                    $class  The class name that is missing.
     * @param  string                                                    $plugin The plugin the filter is missing in.
     * @return void
     * @throws \PlumSearch\Model\Filter\Exception\MissingFilterException
     */
    protected function _throwMissingClassError($class, $plugin)
    {
        throw new MissingFilterException([
            'class' => $class . 'Filter',
            'plugin' => $plugin,
        ]);
    }

    /**
     * Create the filter instance.
     *
     * Part of the template method for Cake\Core\ObjectRegistry::load()
     * Enabled filters will be registered with the event manager.
     *
     * @param  string $class The class name to create.
     * @param  string $alias The alias of the filter.
     * @param  array $config An array of config to use for the filter.
     * @return \PlumSearch\Model\Filter\AbstractFilter The constructed filter class.
     */
    protected function _create($class, $alias, $config)
    {
        if (empty($config['name'])) {
            $config['name'] = $alias;
        }
        $instance = new $class($this, $config);

        return $instance;
    }

    /**
     * Return collection of loaded filters
     *
     * @return \Cake\Collection\Collection
     */
    public function collection()
    {
        return collection($this->_loaded);
    }
}
