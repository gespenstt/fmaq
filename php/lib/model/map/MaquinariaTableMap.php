<?php


/**
 * This class defines the structure of the 'maquinaria' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 12/09/15 19:25:01
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class MaquinariaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MaquinariaTableMap';

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
		$this->setName('maquinaria');
		$this->setPhpName('Maquinaria');
		$this->setClassname('Maquinaria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('MAQ_ID', 'MaqId', 'INTEGER', true, 11, null);
		$this->addForeignKey('MAR_ID', 'MarId', 'INTEGER', 'marca_maquinaria', 'MAR_ID', false, 11, null);
		$this->addForeignKey('TMA_ID', 'TmaId', 'INTEGER', 'tipo_maquinaria', 'TMA_ID', false, 11, null);
		$this->addColumn('MAQ_MODELO', 'MaqModelo', 'VARCHAR', false, 50, null);
		$this->addColumn('MAQ_DESCRIPCION', 'MaqDescripcion', 'LONGVARCHAR', false, null, null);
		$this->addColumn('MAQ_PRECIO', 'MaqPrecio', 'INTEGER', false, 11, null);
		$this->addColumn('MAQ_FONO', 'MaqFono', 'VARCHAR', false, 15, null);
		$this->addColumn('MAQ_CONTACTO', 'MaqContacto', 'VARCHAR', false, 100, null);
		$this->addColumn('MAQ_CORREO', 'MaqCorreo', 'VARCHAR', false, 100, null);
		$this->addColumn('MAQ_ANO', 'MaqAno', 'VARCHAR', false, 10, null);
		$this->addColumn('MAQ_HORAS', 'MaqHoras', 'VARCHAR', false, 15, null);
		$this->addColumn('MAQ_VENTA', 'MaqVenta', 'TINYINT', false, 1, 0);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('MarcaMaquinaria', 'MarcaMaquinaria', RelationMap::MANY_TO_ONE, array('mar_id' => 'mar_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TipoMaquinaria', 'TipoMaquinaria', RelationMap::MANY_TO_ONE, array('tma_id' => 'tma_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('MaquinariaFoto', 'MaquinariaFoto', RelationMap::ONE_TO_MANY, array('maq_id' => 'maq_id', ), 'RESTRICT', 'RESTRICT');
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

} // MaquinariaTableMap
