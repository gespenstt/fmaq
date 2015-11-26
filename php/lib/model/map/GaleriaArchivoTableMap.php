<?php


/**
 * This class defines the structure of the 'galeria_archivo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 11/26/15 21:13:41
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class GaleriaArchivoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.GaleriaArchivoTableMap';

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
		$this->setName('galeria_archivo');
		$this->setPhpName('GaleriaArchivo');
		$this->setClassname('GaleriaArchivo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('GAR_ID', 'GarId', 'INTEGER', true, 11, null);
		$this->addForeignKey('GAL_ID', 'GalId', 'INTEGER', 'galeria', 'GAL_ID', true, 11, null);
		$this->addColumn('GAR_NOMBRE', 'GarNombre', 'LONGVARCHAR', false, null, null);
		$this->addColumn('GAR_RUTA', 'GarRuta', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Galeria', 'Galeria', RelationMap::MANY_TO_ONE, array('gal_id' => 'gal_id', ), 'RESTRICT', 'RESTRICT');
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

} // GaleriaArchivoTableMap
