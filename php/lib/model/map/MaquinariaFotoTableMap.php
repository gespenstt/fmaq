<?php


/**
 * This class defines the structure of the 'maquinaria_foto' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 12/09/15 19:25:02
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class MaquinariaFotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MaquinariaFotoTableMap';

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
		$this->setName('maquinaria_foto');
		$this->setPhpName('MaquinariaFoto');
		$this->setClassname('MaquinariaFoto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('MFO_ID', 'MfoId', 'INTEGER', true, 11, null);
		$this->addForeignKey('MAQ_ID', 'MaqId', 'INTEGER', 'maquinaria', 'MAQ_ID', false, 11, null);
		$this->addColumn('MFO_NOMBRE', 'MfoNombre', 'LONGVARCHAR', false, null, null);
		$this->addColumn('MFO_RUTA', 'MfoRuta', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Maquinaria', 'Maquinaria', RelationMap::MANY_TO_ONE, array('maq_id' => 'maq_id', ), 'RESTRICT', 'RESTRICT');
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

} // MaquinariaFotoTableMap
