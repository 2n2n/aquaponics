<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PondsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PondsTable Test Case
 */
class PondsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PondsTable
     */
    public $Ponds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ponds',
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
        $config = TableRegistry::exists('Ponds') ? [] : ['className' => PondsTable::class];
        $this->Ponds = TableRegistry::get('Ponds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ponds);

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
