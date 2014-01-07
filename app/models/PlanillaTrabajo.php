<?php


class PlanillaTrabajo extends Eloquent {

  protected $table = 'planilla_trabajo'; 
  protected $fillable = array("id_usuario",
                                "ingreso",
								"salida"
							  );
}
