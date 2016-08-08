<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelsTable Test Case
 */
class ModelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelsTable
     */
    public $Models;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.models',
        'app.materials',
        'app.users',
        'app.categories',
        'app.constructors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Models') ? [] : ['className' => 'App\Model\Table\ModelsTable'];
        $this->Models = TableRegistry::get('Models', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Models);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
