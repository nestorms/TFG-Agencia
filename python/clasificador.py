import sys
import json


# Obtener la ruta al archivo temporal de las noticias en formato JSON
ruta_archivo_temporal = sys.argv[1]

# Leer las noticias del archivo temporal en formato JSON
with open(ruta_archivo_temporal, 'r') as archivo:
    noticias_json = archivo.read()

# Decodificar los datos JSON en una lista de Python
noticias = json.loads(noticias_json)['noticias']

# Procesar las noticias según sea necesario
# En este ejemplo, simplemente se devuelve el número de noticias recibidas
num_noticias = len(noticias)

# Imprimir el número de noticias para que PHP pueda capturarla
print(noticias[0]['titulo'])