<?php


/**
 * This class defines the structure of the 'potrero' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/26/15 21:56:52
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PotreroTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PotreroTableMap';

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
		$this->setName('potrero');
		$this->setPhpName('Potrero');
		$this->setClassname('Potrero');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('POT_ID', 'PotId', 'INTEGER', true, 11, null);
		$this->addForeignKey('CAM_ID', 'CamId', 'INTEGER', 'campo', 'CAM_ID', false, 11, null);
		$this->addColumn('POT_NOMBRE', 'PotNombre', 'VARCHAR', false, 100, null);
		$this->addColumn('POT_UBICACION', 'PotUbicacion', 'VARCHAR', false, 100, null);
		$this->addColumn('POT_CANTIDAD_HECTAREAS', 'PotCantidadHectareas', 'VARCHAR', false, 50, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Campo', 'Campo', RelationMap::MANY_TO_ONE, array('cam_id' => 'cam_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Proyecto', 'Proyecto', RelationMap::ONE_TO_MANY, array('pot_id' => 'pot_id', ), 'RESTRICT', 'RESTRICT');
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

} // PotreroTableMap
