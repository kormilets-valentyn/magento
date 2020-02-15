<?php


namespace Module\Test\Setup;


use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Alevel\Learning\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     *
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()
            ->newTable($setup->getTable('myTest_model'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'primary'  => true, 'nullable' => false],
                'Entity Id'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                null,
                [ 'nullable' => false],
                'Name'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Email'
            )->addIndex(
                $setup->getIdxName($setup->getTable('myTest_model'), ['entity_id'], AdapterInterface::INDEX_TYPE_INDEX),
                ['entity_id'],
                [
                    'type' => AdapterInterface::INDEX_TYPE_INDEX
                ]
            );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
