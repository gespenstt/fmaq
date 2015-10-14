<?php


/**
 * This class defines the structure of the 'proyecto_archivo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/15/15 00:21:47
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ProyectoArchivoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProyectoArchivoTableMap';

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
		$this->setName('proyecto_archivo');
		$this->setPhpName('ProyectoArchivo');
		$this->setClassname('ProyectoArchivo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PAR_ID', 'ParId', 'INTEGER', true, 11, null);
		$this->addForeignKey('PRO_ID', 'ProId', 'INTEGER', 'proyecto', 'PRO_ID', false, 11, null);
		$this->addColumn('PAR_NOMBRE', 'ParNombre', 'VARCHAR', false, 100, null);
		$this->addColumn('PAR_RUTA', 'ParRuta', 'VARCHAR', false, 100, null);
		$this->addColumn('PAR_DESCRIPCION', 'ParDescripcion', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Proyecto', 'Proyecto', RelationMap::MANY_TO_ONE, array('pro_id' => 'pro_id', ), 'RESTRICT', 'RESTRICT');
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

} // ProyectoArchivoTableMap
