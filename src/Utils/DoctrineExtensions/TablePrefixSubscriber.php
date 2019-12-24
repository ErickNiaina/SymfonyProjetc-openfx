<?php

namespace  App\Utils\DoctrineExtensions;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;


class  TablePrefixSubscriber implements EventSubscriber
{
    /**
     * @var string
     */
    private $prefix;


    public function __construct($prefix = '') 
    {
        $this->prefix = (string) $prefix;
    }
     
    /**
     * Returns an array of events this subscriber want to listen to.
     * 
     * @return array
     */
    public function getSubscribedEvents() 
    {

        return array('loadClassMetadata');

    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs) {
         
        $classMetadata = $eventArgs->getClassMetadata();
 
        if(strlen($this->prefix)) {
            if(0 !== strpos($classMetadata->getTableName(), $this->prefix)) {
                $classMetadata->setTableName($this->prefix . $classMetadata->getTableName());
            }
        }
        foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
            if ($mapping['type'] == \Doctrine\ORM\Mapping\ClassMetadataInfo::MANY_TO_MANY) {
                if(!isset($classMetadata->associationMappings[$fieldName]['joinTable'])) { continue; }
                $mappedTableName = $classMetadata->associationMappings[$fieldName]['joinTable']['name'];
                if(0 !== strpos($mappedTableName, $this->prefix)) {
                    $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
                }
            }
        }
    }
}
