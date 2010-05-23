<?php

class AppModel extends Model
{
	//--------------------------------------------------------------------------
	/**
	 * Por padrão, não faz buscas recursivas nos models.
	 *
	 * Isso é uma grande melhoria pois o cakephp automaticamente faz as queries
	 * para retornar as associações entre os models. Desta forma, é preciso
	 * especificar manualmente o que o Model deve retornar.
	 */
	public $recursive = -1;
	
	
	//--------------------------------------------------------------------------
	/**
	 * Por padrão todos os Models terão o behavior Containable.
	 */
	public $actsAs = array('Containable');
}

