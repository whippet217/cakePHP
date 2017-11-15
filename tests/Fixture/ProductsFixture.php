<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 *
 */
class ProductsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'name' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'console_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'used' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'developer_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'subcategory_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_indexes' => [
            'developer_id' => ['type' => 'index', 'columns' => ['developer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'subcategory_id_fk' => ['type' => 'foreign', 'columns' => ['subcategory_id'], 'references' => ['subcategories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'developer_id_fk' => ['type' => 'foreign', 'columns' => ['developer_id'], 'references' => ['developers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'console_id_fk' => ['type' => 'foreign', 'columns' => ['console_id'], 'references' => ['consoles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'ichthyolatrous',
            'console_id' => 1,
            'used' => false,
            'developer_id' => 1,
            'description' => 'gnatling quartzy Cabirian spread sursolid occupational unwormy wifeling eductive pictorically moissanite cerebroma miteproof collet wi pentahexahedron metagraphic syntonic hymnologist cluricaune generative subserrate parallelizer overflog',
            'created' => '2017-11-13 18:40:22',
            'modified' => '2017-11-13 18:40:22',
            'subcategory_id' => 1
        ],
        [
            'id' => 2,
            'name' => 'parapsychism',
            'console_id' => 1,
            'used' => false,
            'developer_id' => 1,
            'description' => 'Symbranchia bambini manege modalist turnerite bimotored cognatical toolmark pedological trisodium quadrifariously allamotti brogue ascendance nihilianism ignominy mollify tabooism dilutive mizzle sulphuric shamateur potwaller marchantiaceous',
            'created' => '2017-11-13 18:40:22',
            'modified' => '2017-11-13 18:40:22',
            'subcategory_id' => 1
        ],
    ];
}
