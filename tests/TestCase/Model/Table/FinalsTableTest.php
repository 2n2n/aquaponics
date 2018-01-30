<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FinalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FinalsTable Test Case
 */
class FinalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FinalsTable
     */
    public $Finals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.finals',
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
        $config = TableRegistry::exists('Finals') ? [] : ['className' => FinalsTable::class];
        $this->Finals = TableRegistry::get('Finals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Finals);

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
