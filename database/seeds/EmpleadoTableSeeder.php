<?php

use Illuminate\Database\Seeder;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Emps = DB::table('empleados')
               ->get();
        foreach ($Emps as $emp) {
        	DB::table('users')->Insert([
        		'name'=>$emp->NOMBRES,
        		'email'=>$emp->RFC,
                'usuario_id'=>$emp->id,
        		'password'=>bcrypt($emp->RFC),
        		'tipo'=>'USR'
        	 ]);
        }
    }
}
