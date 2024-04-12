import sys
import json
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import HashingVectorizer
from sklearn.cluster import MeanShift
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np


# Obtengo la ruta al archivo temporal de las noticias en formato JSON
ruta_archivo_temporal = sys.argv[1]

# Leo las noticias del archivo temporal en formato JSON
with open(ruta_archivo_temporal, 'r') as archivo:
    noticias_json = archivo.read()

# Decodifico los datos JSON en una lista de Python
noticias = json.loads(noticias_json)['noticias']

# Creo un array para almacenar los datos de las noticias y sus clases
datos_noticias = []
datos_categorias = []
nombres_categorias = []

# Recorro todas las noticias y almaceno sus datos en el array
for noticia in noticias:
    datos_noticia = ' '.join([noticia['titulo'], noticia['descripcion'], noticia['contenido']])
    datos_noticias.append(datos_noticia)
    datos_categorias.append(noticia['categoria']['id'])
    nombres_categorias.append(noticia['categoria']['nombre'])


# Vectorización del texto
vectorizer = CountVectorizer()

#Algoritmo Mean-Shift
msh = MeanShift()

#Vectorizo los datos para el clustering (todas las noticias del perfil)
X_train_vectorized = vectorizer.fit_transform(datos_noticias)

# Algoritmo de clustering MeanShift
clusters=msh.fit_predict(X_train_vectorized.toarray())

# Calculamos la matriz de conteo entre clusters y categorías
heatmap_data = np.zeros((len(np.unique(clusters)), len(np.unique(datos_categorias))))
for i, cluster in enumerate(np.unique(clusters)):
    for j, categoria in enumerate(np.unique(datos_categorias)):
        heatmap_data[i, j] = np.sum((clusters == cluster) & (datos_categorias == categoria))

# Creamos el mapa de calor
plt.figure(figsize=(10, 6))
sns.heatmap(heatmap_data, annot=True, fmt='g', cmap='YlGnBu')

plt.xticks(np.arange(len(np.unique(nombres_categorias))) + 0.5, np.unique(nombres_categorias))
plt.xlabel('Categorías')
plt.ylabel('Clusters')
plt.title('Mapa de Calor: Relación entre Clusters y Categorías')
plt.savefig('C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\public\\images\\heatmap.png')

print("heatmap.png")