<?php

namespace Pimcore\Bundle\CoreBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Pimcore\Migrations\Migration\AbstractPimcoreMigration;
use Pimcore\Model\DataObject;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190207150938 extends AbstractPimcoreMigration
{
    public function doesSqlMigrations(): bool
    {
        return false;
    }

    /**
     * @param Schema $schema
     *
     * @throws \Exception
     */
    public function up(Schema $schema)
    {

        $list = new DataObject\Objectbrick\Definition\Listing();
        $list = $list->load();
        foreach ($list as $brickDefinition) {
            $this->writeMessage(sprintf('Saving object brick: %s', $brickDefinition->getKey()));
            $brickDefinition->save();
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->writeMessage(sprintf('Please restore your class definition files in %s and run bin/console pimcore:deployment:classes-rebuild manually.', PIMCORE_CLASS_DIRECTORY));
    }
}
