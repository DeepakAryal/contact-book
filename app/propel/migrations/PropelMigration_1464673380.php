<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1464673380.
 * Generated on 2016-05-31 11:28:00 by roshan
 */
class PropelMigration_1464673380
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `address` CHANGE `country` `country` VARCHAR(25);

ALTER TABLE `address` CHANGE `district` `district` VARCHAR(25);

ALTER TABLE `address` CHANGE `village_city` `village_city` VARCHAR(25);

ALTER TABLE `address` CHANGE `address_type` `address_type` VARCHAR(25);

ALTER TABLE `contact` CHANGE `first_name` `first_name` VARCHAR(30) NOT NULL;

ALTER TABLE `contact` CHANGE `last_name` `last_name` VARCHAR(30);

ALTER TABLE `contact` CHANGE `email` `email` VARCHAR(50);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `address` CHANGE `country` `country` VARCHAR(255);

ALTER TABLE `address` CHANGE `district` `district` VARCHAR(255);

ALTER TABLE `address` CHANGE `village_city` `village_city` VARCHAR(255);

ALTER TABLE `address` CHANGE `address_type` `address_type` VARCHAR(255);

ALTER TABLE `contact` CHANGE `first_name` `first_name` VARCHAR(255) NOT NULL;

ALTER TABLE `contact` CHANGE `last_name` `last_name` VARCHAR(255);

ALTER TABLE `contact` CHANGE `email` `email` VARCHAR(255);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}