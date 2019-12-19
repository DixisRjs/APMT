#importar la libreria arcpy para el uso de geoprocesos y os para el #manejo de archivos
import arcpy, os
#funcion de busqueda de archivos tif dentro de una carpeta
def buscarTIF(carpeta):
    lista = []
    for ruta,NombreCarpeta,filename in os.walk(carpeta):
        for archivo in filename:
            if(archivo.endswith('.tif')):
              lista.append(os.path.join(ruta,archivo))
    return lista
#parametros de entrada desde ArcGIS
carpeta_in=arcpy.GetParameterAsText(0)  #carpeta
shpCortar = arcpy.GetParameterAsText(1) #shapefile
carpeta_out=arcpy.GetParameterAsText(2) #carpeta
#guarda la lista de archivos tif
listaTIF = buscarTIF(carpeta_in)
#recorre la lista tif 
for tif in listaTIF:
    #archivo de salida
    salida=tif.replace(carpeta_in,carpeta_out)
    #carpeta de salida
    outFolder=os.path.dirname(os.path.realpath(salida))
    #las carpetas de salida no existen las crea
    if not os.path.exists(outFolder):
        os.makedirs(outFolder)
    #geoproceso de corte de los tif con la mascara de shpCortar
    arcpy.gp.ExtractByMask_sa(tif,shpCortar,salida)

