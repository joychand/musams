<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AbsenteesFixture
 *
 */
class AbsenteesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'row_id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'department_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'creation_date' => ['type' => 'timestamp', 'length' => null, 'default' => 'timezone(\'utc\'::text, now())', 'null' => true, 'comment' => null, 'precision' => null],
        'from_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'to_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'total_lectures' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'total_absentees' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fki_fkey_absentees_department' => ['type' => 'index', 'columns' => ['department_id'], 'length' => []],
            'fki_fkey_absentees_users' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['row_id'], 'length' => []],
            'fkey_absentees_department' => ['type' => 'foreign', 'columns' => ['department_id'], 'references' => ['departments', 'department_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fkey_absentees_users' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'user_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'row_id' => 1,
                'department_id' => 1,
                'user_id' => 1,
                'creation_date' => 1542105269,
                'from_date' => '2018-11-13',
                'to_date' => '2018-11-13',
                'total_lectures' => 1,
                'total_absentees' => 1
            ],
        ];
        parent::init();
    }
}
