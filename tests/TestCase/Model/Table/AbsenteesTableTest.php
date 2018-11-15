<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbsenteesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbsenteesTable Test Case
 */
class AbsenteesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbsenteesTable
     */
    public $Absentees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.absentees',
        'app.departments',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Absentees') ? [] : ['className' => AbsenteesTable::class];
        $this->Absentees = TableRegistry::getTableLocator()->get('Absentees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Absentees);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
