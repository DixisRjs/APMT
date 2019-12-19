#importar la libreria arcpy para el uso de geoprocesos
import arcpy as a
#importar la libreria os para el uso de archivos
import os
#dar la ruta de la carpeta de shapefile que se desea interpolar
shp="D:/smtcc/futuros_mensuales/mri/mri452030.shp"
#establercer modelo, rcp y anio 
modelo="mri"
rcp=45
anio=2030
#leer todos los nombres de los atributos
fields = a.ListFields(shp)
#inicializa variable atributos y nombre
atributos=[]
nombre=[]
#recorre la lista fields para reemplazar nombres de los atributos
for field in fields:
    cadena=str(field.name)
    nombre.append(cadena)
    cadena=cadena.replace('Tmax','tmax')
    cadena=cadena.replace("Tmin","tmin")
    cadena=cadena.replace("Tave","tmed")
    cadena=cadena.replace("PPT","pre")
    atributos.append(cadena)
#declara el espacio de trabajo donde se guardaran las interpolaciones
a.env.workspace = "D:/smtcc/futuros_imagenes_meses/mri"
#recorre el rango de atributos a interpolar
for i in range(7,55):
    fila=str(nombre[i])
    nombrefila=atributos[i]
    #se establece el nombre con cual se guardara la imagen tif
    salida= modelo + str(rcp)+str(anio)+"_"+nombrefila+".tif"
    print fila
    print salida
    #se realiza el geoproceso de interpolación
    #con los parametros de entrada, salida, resolución 
    arcpy.gp.Idw_sa(shp, fila, salida, "0,008333333", "2", "VARIABLE 12", "")

