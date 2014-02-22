<?php

class Application_Model_DbTable_Questions extends Zend_Db_Table_Abstract {
    protected $_name = 'questions';

    public function getCount() {
        $select = $this->select();
        $select->from($this, array('count(*) as amount'));
        $rows = $this->fetchAll($select);

        return($rows[0]->amount);
    }
}
