<?php


/**
 * This class defines the structure of the 'subservicio' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 11/18/15 03:02:57
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SubservicioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SubservicioTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('subservicio');
		$this->setPhpName('Subservicio');
		$this->setClassname('Subservicio');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('SUB_ID', 'SubId', 'INTEGER', true, 11, null);
		$this->addForeignKey('SER_ID', 'SerId', 'INTEGER', 'servicio', 'SER_ID', true, 11, null);
		$this->addColumn('SUB_TITULO', 'SubTitulo', 'VARCHAR', false, 300, null);
		$this->addColumn('SUB_CONTENIDO', 'SubContenido', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Servicio', 'Servicio', RelationMap::MANY_TO_ONE, array('ser_id' => 'ser_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('SubservicioArchivo', 'SubservicioArchivo', RelationMap::ONE_TO_MANY, array('sub_id' => 'sub_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // SubservicioTableMap
