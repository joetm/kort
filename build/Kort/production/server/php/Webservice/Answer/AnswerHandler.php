<?php
namespace Webservice\Answer;

use Webservice\DbProxyHandler;

class AnswerHandler extends DbProxyHandler
{
    protected function getTable()
    {
        return 'kort.select_answer';
    }

    protected function getFields()
    {
        return array('id', 'value', 'title', 'sorting', 'type');
    }

    public function getAllAnswers($limit)
    {
        $this->getDbProxy()->setLimit($limit);
        $this->getDbProxy()->setOrderBy('sorting');
        return $this->getDbProxy()->select();
    }

    public function getSpecificAnswers($type, $limit)
    {
        $this->getDbProxy()->setLimit($limit);
        $this->getDbProxy()->setWhere("type = '" . $type ."'");
        $this->getDbProxy()->setOrderBy('sorting');
        return $this->getDbProxy()->select();
    }
}
