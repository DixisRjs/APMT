INSERT INTO datos_cuenca4 as
    (pre_id,
        tmax01, tmax02, tmax03, tmax04, tmax05, tmax06, 
      tmax07, tmax08, tmax09, tmax10, tmax11, tmax12, 
      tmin01, tmin02, tmin03, tmin04, tmin05, tmin06, 
      tmin07, tmin08, tmin09, tmin10, tmin11, tmin12, 
      tmed01, tmed02, tmed03, tmed04, tmed05, tmed06, 
      tmed07, tmed08, tmed09, tmed10, tmed11, tmed12, 
      pre01, pre02, pre03, pre04, pre05, pre06, 
      pre07, pre08, pre09, pre10, pre11, pre12,
      tmax_anual, tmin_anual, tmed_anual, pre_anual,
    id_cue4,
    pre_fuente,
    pre_modelo,
    pre_rcp
  )
SELECT 
          fut.fut_anio pre_anio,
              avg(fut.tmax01) tmax01, 
          avg(fut.tmax02) tmax02, 
          avg(fut.tmax03) tmax03, 
          avg(fut.tmax04) tmax04, 
          avg(fut.tmax05) tmax05, 
          avg(fut.tmax06) tmax06, 
          avg(fut.tmax07) tmax07, 
          avg(fut.tmax08) tmax08, 
          avg(fut.tmax09) tmax09, 
          avg(fut.tmax10) tmax10, 
          avg(fut.tmax11) tmax11, 
          avg(fut.tmax12) tmax12, 
          avg(fut.tmin01) tmin01, 
          avg(fut.tmin02) tmin02, 
          avg(fut.tmin03) tmin03, 
          avg(fut.tmin04) tmin04, 
          avg(fut.tmin05) tmin05, 
          avg(fut.tmin06) tmin06, 
          avg(fut.tmin07) tmin07, 
          avg(fut.tmin08) tmin08, 
          avg(fut.tmin09) tmin09, 
          avg(fut.tmin10) tmin10, 
          avg(fut.tmin11) tmin11, 
          avg(fut.tmin12) tmin12, 
          avg(fut.tmed01) tmed01, 
          avg(fut.tmed02) tmed02, 
          avg(fut.tmed03) tmed03, 
          avg(fut.tmed04) tmed04, 
          avg(fut.tmed05) tmed05, 
          avg(fut.tmed06) tmed06, 
          avg(fut.tmed07) tmed07, 
          avg(fut.tmed08) tmed08, 
          avg(fut.tmed09) tmed09, 
          avg(fut.tmed10) tmed10, 
          avg(fut.tmed11) tmed11, 
          avg(fut.tmed12) tmed12, 
          avg(fut.pre01) pre01, 
          avg(fut.pre02) pre02, 
          avg(fut.pre03) pre03, 
          avg(fut.pre04) pre04, 
          avg(fut.pre05) pre05, 
          avg(fut.pre06) pre06, 
          avg(fut.pre07) pre07, 
          avg(fut.pre08) pre08, 
          avg(fut.pre09) pre09, 
          avg(fut.pre10) pre10, 
          avg(fut.pre11) pre11, 
          avg(fut.pre12) pre12,
          avg(fut.tmax_anual) tmax_anual,
          avg(fut.tmin_anual) tmin_anual,
          avg(fut.tmed_anual) tmed_anual,
          avg(fut.pre_anual) pre_anual,
                lug.id_cue4,
        'CLIMATE SA' pre_fuente,
        fut.fut_mod pre_modelo,
        fut.fut_rcp pre_rcp
  FROM lugar lug
  INNER JOIN (
        SELECT *
      FROM futuro
      )  as fut ON fut.lug_id = lug.lug_id
  GROUP BY lug.id_cue4,fut.fut_mod,fut.fut_rcp,fut.fut_anio

