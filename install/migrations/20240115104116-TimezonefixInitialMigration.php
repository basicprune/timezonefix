<?php

class TimezonefixInitialMigration extends CmfiveMigration
{
    public function up()
    {
        // UP
        $column = parent::Column();
        $column->setName('id')
                ->setType('biginteger')
                ->setIdentity(true);

        if (!$this->hasTable("timezonefix_input")) { //it can be helpful to check that the table name is not used
            $this->table("timezonefix_input", [ // table names should be appended with 'ModuleName_'
                    "id" => false,
                    "primary_key" => "id"
                ])->addColumn($column) // add the id column
                ->addDateTimeColumn('dt_DateTimeTable')
                ->addStringColumn('timezone') // Datetime columns need to be appended with 'dt_'
                ->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
                ->create();
        }
        

    }

    public function down()
    {
        $this->hasTable('timezonefix_input') ? $this->dropTable('timezonefix_input') : null;
    }

    public function preText()
    {
        return null;
    }

    public function postText()
    {
        return null;
    }

    public function description()
    {
        return null;
    }
}
