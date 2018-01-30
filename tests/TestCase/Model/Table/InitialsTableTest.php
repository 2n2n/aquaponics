<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InitialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InitialsTable Test Case
 */
class InitialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InitialsTable
     */
    public $Initials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.initials',
        'app.kinds',
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
        $config = TableRegistry::exists('Initials') ? [] : ['className' => InitialsTable::class];
        $this->Initials = TableRegistry::get('Initials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Initials);

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
