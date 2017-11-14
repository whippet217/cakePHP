<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SubcategoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SubcategoriesController Test Case
 */
class SubcategoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subcategories',
        'app.categories',
        'app.products',
        'app.products_description_translation',
        'app.i18n',
        'app.consoles',
        'app.developers',
        'app.wishlists',
        'app.users',
        'app.reviews',
        'app.files',
        'app.products_files'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}