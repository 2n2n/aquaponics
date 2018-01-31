<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InifinalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InifinalsTable Test Case
 */
class InifinalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InifinalsTable
     */
    public $Inifinals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inifinals',
        'app.initials',
        'app.kinds',
        'app.types',
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
        $config = TableRegistry::exists('Inifinals') ? [] : ['className' => InifinalsTable::class];
        $this->Inifinals = TableRegistry::get('Inifinals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inifinals);

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
