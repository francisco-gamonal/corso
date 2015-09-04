<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 07:37 PM
 */

namespace Corso\Repositories;

use Corso\Entities\Employee;

class EmployeeRepository extends BaseRepository
{

    /**
     * @return \Corso\Entities\Employee
     */
    public function getModel()
    {
        return new Employee();
    }
    public function anyData()
    {
        return $this->newQuery()->select('id','fname','sname','flast','slast','charter','phone')->get();
    }
}