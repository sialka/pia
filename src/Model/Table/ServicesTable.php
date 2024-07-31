<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\Network\Session;
use Cake\ORM\Rule\IsUnique;

class ServicesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('services');
        $this->setDisplayField('senha');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');   
        
        $this->hasOne('Localidades', [
            'className'         => 'Localidades',
            'bindingKey'        => 'localidade_id',
            'foreignKey'        => 'id',
            'propertyName'      => 'Localidades',            
        ]);   

    }
    
    public function buildRules(RulesChecker $rules)
    {

        $rules->add($rules->isUnique(['senha'], 'A senha já foi identificada !!!'));        

        return $rules;
    }

    public function validacoes($senha = null, $localidade_id = null, $tipo, $id) 
    {   

        if ($tipo == 'add') {
            $senha_entity = $this->find('all')->contain(['Localidades'])->where(['senha' => $senha])->first();           

            if ($senha_entity) {            
                
                $erro = "A localidade <strong>{$senha_entity->Localidades->nome}</strong> já foi identicada na senha <strong>{$senha}</strong> !!!!";           

                return [ 'status' => true, 'erro' => $erro ];
            }      
        }  

        $senha_entity = $this->find('all')->contain(['Localidades'])->where(['localidade_id' => $localidade_id])->first();    
        
        if ($senha_entity) {
            
            if($senha_entity->id != $id){            
                $erro = "A senha <strong>{$senha_entity->senha}</strong> já foi identicada para a localidade <strong>{$senha_entity->Localidades->nome}</strong> !!!!";
                return [ 'status' => true, 'erro' => $erro ];
            }
        }
        

        return ['status' => false, 'entity' => null ];        
    }

}