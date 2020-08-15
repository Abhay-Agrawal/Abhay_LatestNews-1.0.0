<?php

namespace Abhay\LatestNews\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (!$installer->tableExists('latest_news')) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable('latest_news'))
                ->addColumn(
                    'news_id',
                    Table::TYPE_INTEGER,
                    10,
                    ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true]
                )
                ->addColumn('title', Table::TYPE_TEXT, 255, ['nullable' => false])
                ->addColumn('status', Table::TYPE_INTEGER, 10, ['nullable' => false])
                ->addColumn('author_name', Table::TYPE_TEXT, 255, [], 'Author Name')
                ->addColumn('start_date', Table::TYPE_DATE, 255, [], 'OFFER  START DATE')
                ->addColumn('end_date', Table::TYPE_DATE, 255,[], 'OFFER END DATE')
                ->addColumn('content', Table::TYPE_TEXT, '64k', [], 'News Content')
                ->addColumn(
                  'created_at',
						      Table::TYPE_TIMESTAMP,
					      	null,
						      ['nullable' => false, 'default' =>Table::TIMESTAMP_INIT],
						     'Created At'
			     	    )->addColumn(
                  'updated_at',
					        Table::TYPE_TIMESTAMP,
					        null,
					       ['nullable' => false, 'default' =>Table::TIMESTAMP_INIT_UPDATE],
					       'Updated At')
               ->setComment('News table');

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
