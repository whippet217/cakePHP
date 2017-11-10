<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ConsolesTable|\Cake\ORM\Association\BelongsTo $Consoles
 * @property \App\Model\Table\DevelopersTable|\Cake\ORM\Association\BelongsTo $Developers
 * @property \App\Model\Table\WishlistsTable|\Cake\ORM\Association\HasMany $Wishlists
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', ['fields' => ['description']]);

        $this->belongsTo('Consoles', [
            'foreignKey' => 'console_id'
        ]);
        $this->belongsTo('Developers', [
            'foreignKey' => 'developer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Wishlists', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'products_files'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('used')
            ->allowEmpty('used');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['console_id'], 'Consoles'));
        $rules->add($rules->existsIn(['developer_id'], 'Developers'));

        return $rules;
    }
}
