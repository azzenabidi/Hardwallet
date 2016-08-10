<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConstructorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConstructorsTable Test Case
 */
class ConstructorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConstructorsTable
     */
    public $Constructors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.constructors',
        'app.materials',
        'app.models',
        'app.users',
        'app.departments',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Constructors') ? [] : ['className' => 'App\Model\Table\ConstructorsTable'];
        $this->Constructors = TableRegistry::get('Constructors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Constructors);

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
}
