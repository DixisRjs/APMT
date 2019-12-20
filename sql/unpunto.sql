CREATE TABLE auxColomi AS
SELECT 
p.*,
        his.fut_anio csa_anio,
                his.tmax01, 
            his.tmax02, 
            his.tmax03, 
            his.tmax04, 
            his.tmax05, 
            his.tmax06, 
            his.tmax07, 
            his.tmax08, 
            his.tmax09, 
            his.tmax10, 
            his.tmax11, 
            his.tmax12, 
            his.tmin01, 
            his.tmin02, 
            his.tmin03, 
            his.tmin04, 
            his.tmin05, 
            his.tmin06, 
            his.tmin07, 
            his.tmin08, 
            his.tmin09, 
            his.tmin10, 
            his.tmin11, 
            his.tmin12, 
            his.tmed01, 
            his.tmed02, 
            his.tmed03, 
            his.tmed04, 
            his.tmed05, 
            his.tmed06, 
            his.tmed07, 
            his.tmed08, 
            his.tmed09, 
            his.tmed10, 
            his.tmed11, 
            his.tmed12, 
            his.pre01, 
            his.pre02, 
            his.pre03, 
            his.pre04, 
            his.pre05, 
            his.pre06, 
            his.pre07, 
            his.pre08, 
            his.pre09, 
            his.pre10, 
            his.pre11, 
            his.pre12,
            his.tmax_anual,
            his.tmin_anual,
            his.tmed_anual,
            his.pre_anual,
            his.fut_rcp rcp,
            his.fut_mod modelo
FROM (SELECT 
       ST_SetSRID(
         ST_MakePoint(-65.8725,-17.339722 ),
          4326
        ) as geom
    ) AS p  INNER JOIN (SELECT 
        lug.*,
    ST_Buffer(
     lug.geom,
     0.00417, 'endcap=square'
  ) sq from lugar lug) AS n
    ON ST_Intersects(p.geom, n.sq)
INNER JOIN historico his ON his.lug_id = n.lug_id

