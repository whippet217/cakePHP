<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsolesTable Test Case
 */
class ConsolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsolesTable
     */
    public $Consoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.consoles',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Consoles') ? [] : ['className' => ConsolesTable::class];
        $this->Consoles = TableRegistry::get('Consoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Consoles);

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
