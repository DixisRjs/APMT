import arcpy as a
import os
from arcpy import env
from arcpy.sa import *
def buscarTIF(carpeta):
    lista = []
    Narchivos=[]
    for ruta,NombreCarpeta,filename in os.walk(carpeta):
        for archivo in filename:
            if(archivo.endswith('.tif')):
              lista.append(os.path.join(ruta,archivo))
              Narchivos.append(archivo)
    return lista, Narchivos
#parametros para ingresar desde arcgis
carpeta_in=arcpy.GetParameterAsText(0)
tifnormal = arcpy.GetParameterAsText(1)
carpeta_out=arcpy.GetParameterAsText(2)
listatif, archivos= buscarTIF(carpeta_in)
n= len(listatif)
for i in range(n):
    salida=archivos[i]
    salida=salida.replace("anual","")
    salida="D_"+salida
    archivosalida=carpeta_out+"\\"+salida
    print archivosalida
    tif=listatif[i]
    outMinus = Minus(tif, tifnormal)
    outMinus.save(archivosalida)

