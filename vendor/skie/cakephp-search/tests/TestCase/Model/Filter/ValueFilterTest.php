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
namespace PlumSearch\Test\TestCase\Model\Filter;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use PlumSearch\Model;
use PlumSearch\Model\FilterRegistry;
use PlumSearch\Model\Filter\ValueFilter;

/**
 * PlumSearch\Model\Filter\ValueFilter Test Case
 */
class ValueFilterTest extends TestCase
{
    public $fixtures = [
        'plugin.plum_search.articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Table = TableRegistry::get('Articles');
        $this->FilterRegistry = new FilterRegistry($this->Table);
        $this->ValueFilter = new ValueFilter($this->FilterRegistry, [
            'name' => 'id'
        ]);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ValueFilter);
        parent::tearDown();
    }


    /**
     * Test constructor method
     *
     * @expectedException \PlumSearch\Model\Filter\Exception\MissingFilterException
     * @return void
     */
    public function testConstruct()
    {
        $this->ValueFilter = new ValueFilter($this->FilterRegistry, ['field' => 'id']);
    }

    /**
     * Test apply method
     *
     * @return void
     */
    public function testApply()
    {
        $query = $this->Table->find('all');
        $this->ValueFilter->apply($query, ['id' => 1]);
        $store = null;
        $query->traverse(function ($d, $type) use (&$store) {
            $store = $d;
        }, ['where']);
        $store2 = null;
        $store->traverse(function ($d) use (&$store2) {
            $store2 = $d;
        }, ['where']);

        $this->assertEquals($store2->sql($query->valueBinder()), 'id = :c0');
        $this->assertEquals($store2->getValue(), 1);
    }

    /**
     * Test apply method
     *
     * @return void
     */
    public function testApplyWithFieldDefined()
    {
        $query = $this->Table->find('withAuthors');

        $this->FilterRegistry = new FilterRegistry($this->Table);
        $this->ValueFilter = new ValueFilter($this->FilterRegistry, [
            'name' => 'author_name',
            'field' => 'Authors.name'
        ]);

        $this->ValueFilter->apply($query, [
            'author_name' => 'larry',
        ]);
        $store = null;
        $query->traverse(function ($d, $type) use (&$store) {
            $store = $d;
        }, ['where']);

        $store2 = null;
        $store->traverse(function ($d) use (&$store2) {
            $store2 = $d;
        }, ['where']);

        $this->assertEquals($store2->sql($query->valueBinder()), 'Authors.name = :c0');
        $this->assertEquals($store2->getValue(), 'larry');
    }

    /**
     * Test apply method
     *
     * @return void
     */
    public function testApplyArray()
    {
        $query = $this->Table->find('all');
        $this->ValueFilter->apply($query, ['id' => [1, 2]]);
        $store = null;
        $query->traverse(function ($d, $type) use (&$store) {
            $store = $d;
        }, ['where']);
        $store2 = null;
        $store->traverse(function ($d) use (&$store2) {
            $store2 = $d;
        }, ['where']);

        $this->assertEquals($store2->sql($query->valueBinder()), 'id in (:c0,:c1)');
        $this->assertEquals($store2->getValue(), [1, 2]);
    }
}
