select * from departamento;

select * from establecimiento;

select * from personal_especialidad;

select * from  atributo_establecimiento;

select * from  ambiente_upssups;

select * from  atributo;



select 
	e.codigo,
    e.nombre establecimiento,
    cat.nombre categoria,
    
	dep.nombre dep, 
    prov.nombre prov, 
    dist.nombre dist, 
    e.direccion,
    
    e.gral_aniomarcha 'Año Funcionamiento',
    e.gral_nrocamas 'N° Camas',
    e.geo_nropisosestabl 'N° Pisos',
    (e.gral_inversionequip + e.gral_inversionInfra) 'Inversión Total',
    e.geo_areaterreno 'Área de Terreno',
    e.geo_areaconstruida 'Área Construida' -- ,e.* 
    
from establecimiento e 

left join distrito dist on dist.id = e.distrito_id 
left join provincia prov on prov.id = dist.provincia_id 
left join departamento dep on dep.id = prov.departamento_id 
left join categoria cat on cat.id = e.categoria_id 

where e.activo = 1
;

select * from establecimiento;

select 

establecimiento.codigo, 
establecimiento.nombre establecimiento, 
categoria.nombre categoria, 
departamento.nombre dep, 
provincia.nombre prov, 
distrito.nombre dist, 
establecimiento.direccion, 
establecimiento.gral_aniomarcha 'Año Funcionamiento', 
establecimiento.gral_nrocamas 'N° Camas', 
establecimiento.geo_nropisosestabl 'N° Pisos', 
sum(establecimiento.gral_inversionequip + establecimiento.gral_inversionInfra) 'Inversión Total', 
establecimiento.geo_areaterreno 'Área de Terreno', 
establecimiento.geo_areaconstruida 'Área Construida' 

from `establecimiento` 
inner join `distrito` on `distrito`.`id` = `establecimiento`.`distrito_id` 
inner join `provincia` on `provincia`.`id` = `establecimiento`.`provincia_id` 
inner join `departamento` on `departamento`.`id` = `establecimiento`.`departamento_id` 
inner join `categoria` on `categoria`.`id` = `establecimiento`.`categoria_id`
;

select 
    round((
		e.conserv_arquitect+
		e.conserv_estruct+
        e.conserv_instaelect+
        e.conserv_instasanit
    )/4 ) 'Estado General' -- , e.* 
from establecimiento e
;


select * from establecimiento where codigo='000' and activo = 2;

