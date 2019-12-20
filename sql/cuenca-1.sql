INSERT INTO cuencadatoschapare
SELECT 
                        p.*,
            tmp.fut_anio csa_anio,
              avg(tmp.tmax01) tmax01,
              avg(tmp.tmax02) tmax02,
              avg(tmp.tmax03) tmax03,
              avg(tmp.tmax04) tmax04,
              avg(tmp.tmax05) tmax05,
              avg(tmp.tmax06) tmax06,
              avg(tmp.tmax07) tmax07,
              avg(tmp.tmax08) tmax08,
              avg(tmp.tmax09) tmax09,
              avg(tmp.tmax10) tmax10,
              avg(tmp.tmax11) tmax11,
              avg(tmp.tmax12) tmax12,
              avg(tmp.tmin01) tmin01,
              avg(tmp.tmin02) tmin02,
              avg(tmp.tmin03) tmin03,
              avg(tmp.tmin04) tmin04,
              avg(tmp.tmin05) tmin05,
              avg(tmp.tmin06) tmin06,
              avg(tmp.tmin07) tmin07,
              avg(tmp.tmin08) tmin08,
              avg(tmp.tmin09) tmin09,
              avg(tmp.tmin10) tmin10,
              avg(tmp.tmin11) tmin11,
              avg(tmp.tmin12) tmin12,
              avg(tmp.tmed01) tmed01,
              avg(tmp.tmed02) tmed02,
              avg(tmp.tmed03) tmed03,
              avg(tmp.tmed04) tmed04,
              avg(tmp.tmed05) tmed05,
              avg(tmp.tmed06) tmed06,
              avg(tmp.tmed07) tmed07,
              avg(tmp.tmed08) tmed08,
              avg(tmp.tmed09) tmed09,
              avg(tmp.tmed10) tmed10,
              avg(tmp.tmed11) tmed11,
              avg(tmp.tmed12) tmed12,
                    avg(tmp.pre01) pre01,
                    avg(tmp.pre02) pre02,
                    avg(tmp.pre03) pre03,
                    avg(tmp.pre04) pre04,
                    avg(tmp.pre05) pre05,
                    avg(tmp.pre06) pre06,
                    avg(tmp.pre07) pre07,
                    avg(tmp.pre08) pre08,
                    avg(tmp.pre09) pre09,
                    avg(tmp.pre10) pre10,
                    avg(tmp.pre11) pre11,
                    avg(tmp.pre12) pre12,
            avg(tmp.tmax_anual) tmax_anual,
            avg(tmp.tmin_anual) tmin_anual,
            avg(tmp.tmed_anual) tmed_anual,
            avg(tmp.pre_anual) pre_anual,
            '' tmp.fut_rcp,
            '' tmp.fut_mod
        FROM
          (
            SELECT 
                p.*,
                hhh.*,
            from lugar  n
            INNER JOIN cuencachapare AS p  ON ST_Intersects(p.geom, n.geom)
            INNER JOIN futuro AS hhh  ON hhh.lug_id = n.lug_id
          )tmp
          GROUP BY tmp.gid,tmp.csa_anio






