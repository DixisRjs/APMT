#importar la libreria arcpy para el uso de geoprocesos
import arcpy as a
#importar la libreria os para el uso de archivos
import os
#dar la ruta de la carpeta de shapefile que se desea interpolar
shp="D:/smtcc/historicos_anuales/tmin_anual.shp"
#funcion que devuelve los ultimos valores de una lista
def right(value,count):
    return value[-count:]
#lista de atributos de shp
fields = a.ListFields(shp)
atributos=[]
nombre=[]
anios=[]
#recorrido en fields para el cambio de nombre de los atributos
for field in fields:
    cadena=str(field.name)
    nombre.append(cadena)
    anio=right(cadena,2)
    cadena=cadena.strip(anio)
    if anio=="80":
        anio=1980
    elif anio=="81":
        anio=1981
    elif anio=="82":
        anio=1982
    elif anio=="83":
        anio=1983
    elif anio=="84":
        anio=1984
    elif anio=="85":
        anio=1985
    elif anio=="86":
        anio=1986
    elif anio=="87":
        anio=1987
    elif anio=="88":
        anio=1988
    elif anio=="89":
        anio=1989
    elif anio=="90":
        anio=1990
    elif anio=="91":
        anio=1991
    elif anio=="92":
        anio=1992
    elif anio=="93":
        anio=1993
    elif anio=="94":
        anio=1994
    elif anio=="95":
        anio=1995
    elif anio=="96":
        anio=1996
    elif anio=="97":
        anio=1997
    elif anio=="98":
        anio=1998
    elif anio=="99":
        anio=1999
    elif anio=="00":
        anio=2000
    elif anio=="01":
        anio=2001
    elif anio=="02":
        anio=2002
    elif anio=="03":
        anio=2003
    elif anio=="04":
        anio=2004
    elif anio=="05":
        anio=2005
    elif anio=="06":
        anio=2006
    elif anio=="07":
        anio=2007
    elif anio=="08":
        anio=2008
    elif anio=="09":
        anio=2009
    elif anio=="10":
        anio=2010
    elif anio=="11":
        anio=2011
    elif anio=="12":
        anio=2012
    else:
        anio=2013
    atri=str(anio)+ "_"+cadena
    atributos.append(atri)
#declarar el espacio de trabajo donde se guardaran las interpolaciones
a.env.workspace = "D:/smtcc/historicos_anuales"
#recorrido en el rango de atributos que se quiere interpolar
for i in range(5,38):
    fila=str(nombre[i])
    nombrefila=atributos[i]
    salida= nombrefila+".tif"
    #geoproceso de interpolacion con una entrada, salida y resolución
    arcpy.gp.Idw_sa(shp, fila, salida, "0,008333333", "2", "VARIABLE 12", "")

