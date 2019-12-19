CREATE SEQUENCE dat4seq START WITH 1;
ALTER TABLE datos_cuenca4 ALTER COLUMN pre_id
SET DEFAULT nextval('dat4seq');

CREATE SEQUENCE dat5seq START WITH 1;
ALTER TABLE datos_cuenca5 ALTER COLUMN pre_id
SET DEFAULT nextval('dat5seq');

CREATE SEQUENCE perseq START WITH 1;
    ALTER TABLE periodo ALTER COLUMN pre_id
    SET DEFAULT nextval(perseq');
