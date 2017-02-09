-- Function: upd_aut_val(bigint, character varying, character varying, character varying)

-- DROP FUNCTION upd_aut_val(bigint, character varying, character varying, character varying);

CREATE OR REPLACE FUNCTION upd_aut_val(
    idaut bigint,
    codautval character varying,
    valautval character varying,
    undautval character varying)
  RETURNS bigint AS
$BODY$

/**
*** Autor: avalenzuela
*** Fecha: 11-12-2014
*** Descripción: Ingresa o actualiza valor asociado a una autorización.
**/
DECLARE
	countAut BIGINT := 0;
	idAutVal BIGINT := 0;
	result BIGINT := 0;
BEGIN

	SELECT count(1) INTO countAut FROM autorizaciones WHERE id_aut = idaut;

	IF(countAut > 0) THEN
		--select * from autorizaciones_valores
		SELECT id_autval INTO idAutVal FROM autorizaciones_valores WHERE id_aut = idAut AND cod_autval = codautval;
		IF(idAutVal > 0) THEN
			UPDATE autorizaciones_valores SET cod_autval = codautval, val_autval = valautval, und_autval = undautval WHERE id_autval = idAutVal;
			result := idAutVal;
		ELSE
			INSERT INTO autorizaciones_valores (id_aut, cod_autval, val_autval, und_autval) VALUES (idaut, codautval, valautval, undautval);
			result := CURRVAL('seq_autval');
		END IF;
	END IF;

	RETURN result;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION upd_aut_val(bigint, character varying, character varying, character varying)
  OWNER TO postgres;
COMMENT ON FUNCTION upd_aut_val(bigint, character varying, character varying, character varying) IS 'Ingresa o actualiza un valor asociado a una autorización.';
