<?php

class DatabaseSeeder extends Seeder {

	/**
	 * @var array
	 */
	private $tables = ['roles', 'users', 'tables', 'reservations', 'item_categories', 'items', 'orders', 'item_order'];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->cleanDatabase();
		
		Eloquent::unguard();

		$this->call('RolesTableSeeder');

		if( App::environment('development') )
		{
			$this->call('UsersTableSeeder');
			$this->call('TablesTableSeeder');
			$this->call('ReservationsTableSeeder');
			$this->call('ItemCategoriesTableSeeder');
			$this->call('ItemsTableSeeder');
			$this->call('OrdersTableSeeder');
			$this->call('ItemsOrdersTableSeeder');
		}
		else 
		{
			$this->call('AdminTableSeeder');
		}

	}

	/**
	 * truncate all databases
	 * @return void 
	 */
	private function cleanDatabase()
	{
		//uncomment if using mysql, comment if using sqlite
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); //to be able to truncate table with foreign key contraints
		foreach ($this->tables as $table) 
		{
			DB::table($table)->truncate();	
		}
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}