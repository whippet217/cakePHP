<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ConsolesController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ConsolesController Test Case
 */
class ConsolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.consoles',
    ];

    /**
     * test add() method
     *
     * @return void
     */
    public function testAdd() {
        
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'isAdmin' => true
                    ]
                ]
            ]
        );
        
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->post(Router::url(
                        ['controller' => 'consoles',
                            'action' => 'add',
                            '_ext' => 'json'
                ]), ['name' => 'run test']);

        $this->assertResponseSuccess();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }

        /**
     * test edit() method
     *
     * @return void
     */
    public function testEdit() {
        
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'isAdmin' => true
                    ]
                ]
            ]
        );
        
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->post(Router::url(
                        ['controller' => 'consoles',
                            'action' => 'edit',
                            '_ext' => 'json',
                            1
                ]), ['name' => 'edit test']);

        $this->assertResponseSuccess();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }
    
    /**
     * test delete() method
     *
     * @return void
     */
    public function testDelete() {
        
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'isAdmin' => true
                    ]
                ]
            ]
        );
        
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $this->get(Router::url(
                        ['controller' => 'consoles',
                            'action' => 'delete',
                            '_ext' => 'json',
                            1
                ])
        );
        $this->assertResponseSuccess();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }
    
        /**
     * test get() method
     *
     * @return void
     */
    public function testGet() {
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $this->post(Router::url(
                        ['controller' => 'consoles',
                            'action' => 'get',
                            '_ext' => 'json'
                ])
        );
        $this->assertResponseOk();

        $expected = [
            'consoles' =>
            [
                [
                    'id' => 1,
                    'name' => 'loosen',
                    'created' => '2017-10-02T01:12:02+00:00',
                    'modified' => '2017-10-02T01:12:02+00:00'
                ]
            ],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }
}
