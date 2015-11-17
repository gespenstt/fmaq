<?php


/**
 * This class defines the structure of the 'subservicio_archivo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 11/17/15 23:02:18
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SubservicioArchivoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SubservicioArchivoTableMap';

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
		$this->setName('subservicio_archivo');
		$this->setPhpName('SubservicioArchivo');
		$this->setClassname('SubservicioArchivo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('SAR_ID', 'SarId', 'INTEGER', true, 11, null);
		$this->addForeignKey('SUB_ID', 'SubId', 'INTEGER', 'subservicio', 'SUB_ID', true, 11, null);
		$this->addColumn('SAR_NOMBRE', 'SarNombre', 'VARCHAR', false, 300, null);
		$this->addColumn('SAR_RUTA', 'SarRuta', 'VARCHAR', false, 300, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Subservicio', 'Subservicio', RelationMap::MANY_TO_ONE, array('sub_id' => 'sub_id', ), 'RESTRICT', 'RESTRICT');
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // SubservicioArchivoTableMap