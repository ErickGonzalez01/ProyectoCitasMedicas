DELIMITER //
create procedure obtener_cita_id(in usuario_id int)
begin
	select * from citas_medicas as cm inner join pacientes as p   where id = usuario_id;
end

DELIMITER ;

select * from citas_medicas as cm inner join pacientes as p on cm.id_paciente=p.id  where cm.id =17;

select * from citas_medicas;

