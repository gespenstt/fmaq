<?php


/**
 * This class defines the structure of the 'proyecto' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 12/09/15 19:25:03
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ProyectoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProyectoTableMap';

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
		$this->setName('proyecto');
		$this->setPhpName('Proyecto');
		$this->setClassname('Proyecto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PRO_ID', 'ProId', 'INTEGER', true, 11, null);
		$this->addForeignKey('POT_ID', 'PotId', 'INTEGER', 'potrero', 'POT_ID', false, 11, null);
		$this->addForeignKey('TPR_ID', 'TprId', 'INTEGER', 'tipo_proyecto', 'TPR_ID', false, 11, null);
		$this->addColumn('PRO_NOMBRE', 'ProNombre', 'LONGVARCHAR', false, null, null);
		$this->addColumn('PRO_FECHA', 'ProFecha', 'TIMESTAMP', false, null, null);
		$this->addColumn('PRO_DESCRIPCION', 'ProDescripcion', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Potrero', 'Potrero', RelationMap::MANY_TO_ONE, array('pot_id' => 'pot_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TipoProyecto', 'TipoProyecto', RelationMap::MANY_TO_ONE, array('tpr_id' => 'tpr_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('ProyectoArchivo', 'ProyectoArchivo', RelationMap::ONE_TO_MANY, array('pro_id' => 'pro_id', ), 'RESTRICT', 'RESTRICT');
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

} // ProyectoTableMap
