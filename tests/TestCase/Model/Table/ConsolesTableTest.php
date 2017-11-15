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
    'app.consoles'
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
    * test saving of a to-do, validation
    *
    * @return void
    */
    public function testSaving() {
        $data = ['name' => ''];
        $console = $this->Consoles->newEntity($data);
        $resultingError = $this->Consoles->validator()->errors($data);
        $expectedError = [
        'name' => [
        '_empty' => 'This field cannot be left empty'
        ]
        ];
        $this->assertEquals($expectedError, $resultingError);

        $total = $this->Consoles->find()->count();
        $this->assertEquals(1, $total);

        $data = ['name' => 'testing'];
        $console = $this->Consoles->newEntity($data);
        $this->Consoles->save($console);
        $newTotal = $this->Consoles->find()->count();
        $this->assertEquals(2, $newTotal);
    }
    
    /**
    * test modiying of a to-do
    *
    * @return void
    */
    public function testModifying() {
        $consoles = TableRegistry::get('Consoles');
        $actualConsole = $consoles->get(1);
        $consoles->patchEntity($actualConsole, ['name' => 'Edited To-do']);
        $consoles->save($actualConsole);        
        $modifiedConsole = $consoles->get(1);
        $this->assertEquals($modifiedConsole->name, $actualConsole->name);                
    }
    
    /**
    * test modiying of a to-do
    *
    * @return void
    */
    public function testDelete() {
        $consoles = TableRegistry::get('Consoles');
        $console = $consoles->get(1);
        $this->Consoles->delete($console);
        $newTotal = $this->Consoles->find()->count();
        $this->assertEquals(0, $newTotal);
    }
}