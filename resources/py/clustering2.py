import sys
import json
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.cluster import MeanShift
from sklearn.cluster import DBSCAN
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np
from sklearn.decomposition import PCA

# Obtengo la ruta al archivo temporal de las noticias en formato JSON
ruta_archivo_temporal = sys.argv[1]
id_usuario = sys.argv[2]

# Leo las noticias del archivo temporal en formato JSON
with open(ruta_archivo_temporal, 'r') as archivo:
    noticias_json = archivo.read()

# Decodifico los datos JSON en una lista de Python
noticias = json.loads(noticias_json)['noticias']

# Creo arrays para almacenar los datos de las noticias, sus clases y sus ids
datos_noticias = []
datos_categorias = []
nombres_categorias = {}
ids_noticias = []

# Diccionario para almacenar el id de la noticia y su información
noticias_dict = {}

# Recorro todas las noticias y almaceno sus datos en los arrays
for noticia in noticias:
    datos_noticia = ' '.join([noticia['titulo'], noticia['descripcion'], noticia['contenido']])
    datos_noticias.append(datos_noticia)
    datos_categorias.append(noticia['categoria']['id'])
    nombres_categorias[noticia['categoria']['id']] = noticia['categoria']['nombre']
    ids_noticias.append(noticia['id'])
    noticias_dict[noticia['id']] = noticia

# Vectorización del texto
vectorizer = TfidfVectorizer()

# Algoritmo Mean-Shift
msh = MeanShift()

dbscan = DBSCAN(eps=1.05, min_samples=2, metric='euclidean')


# Vectorizo los datos para el clustering (todas las noticias del perfil)
X_train_vectorized = vectorizer.fit_transform(datos_noticias)

# Algoritmo de clustering MeanShift
#clusters = msh.fit_predict(X_train_vectorized.toarray())
clusters = dbscan.fit_predict(X_train_vectorized.toarray())

# Reducir la dimensionalidad a 2D para visualización usando PCA
pca = PCA(n_components=2)
X_pca = pca.fit_transform(X_train_vectorized.toarray())

# Crear un diccionario para almacenar los clusters y sus noticias correspondientes
clusters_dict = {}
for idx, cluster in enumerate(clusters):
    if cluster not in clusters_dict:
        clusters_dict[int(cluster)] = []
    clusters_dict[int(cluster)].append(ids_noticias[idx])

# Crear una estructura de datos JSON con los clusters y noticias
clusters_json = []
for cluster, ids in clusters_dict.items():
    cluster_data = {
        'cluster': int(cluster),
        'noticias': [{'id': int(noticia_id), 'titulo': noticias_dict[noticia_id]['titulo']} for noticia_id in ids]
    }
    clusters_json.append(cluster_data)

# Imprimir la salida en formato JSON
print(json.dumps(clusters_json))




#################################################################################################################



#Mapa de calor
# Calculamos la matriz de conteo entre clusters y categorías
heatmap_data = np.zeros((len(np.unique(clusters)), len(np.unique(datos_categorias))))

for i, cluster in enumerate(np.unique(clusters)):
    for j, categoria in enumerate(np.unique(datos_categorias)):
        heatmap_data[i, j] = np.sum((clusters == cluster) & (np.array(datos_categorias) == categoria))

# Creamos el mapa de calor
plt.figure(figsize=(10, 6))
sns.heatmap(heatmap_data, annot=True, fmt='g', cmap='YlGnBu')

etiquetas_x = []
for i in nombres_categorias:
    etiquetas_x.append(nombres_categorias[i])

ultimo_elemento = etiquetas_x.pop()  # Guardar y eliminar el último elemento
etiquetas_x.insert(0, ultimo_elemento)  # Insertar el último elemento al principio

plt.xticks(np.arange(len(np.unique(etiquetas_x))) + 0.5, etiquetas_x)
plt.xlabel('Categorías')
plt.ylabel('Clusters')
plt.title('Mapa de Calor: Relación entre Clusters y Categorías')

plt.savefig('C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\public\\images\\heatmap_{}.png'.format(id_usuario))

print('heatmap_{}.png'.format(id_usuario))



#################################################################################################################



#Gráfico de dispersión
# Crear gráfico de dispersión con círculos que indican los clusters
plt.figure(figsize=(10, 6))

# Colores para cada cluster
colors = plt.cm.tab20(np.linspace(0, 1, len(np.unique(clusters))))

for cluster_id in np.unique(clusters):
    cluster_points = X_pca[clusters == cluster_id]
    plt.scatter(cluster_points[:, 0], cluster_points[:, 1], s=30, color=colors[cluster_id], label=f'Cluster {cluster_id}')
    # Dibujar un círculo alrededor del cluster
    center = cluster_points.mean(axis=0)
    radius = np.linalg.norm(cluster_points - center, axis=1).max()
    circle = plt.Circle(center, radius, color=colors[cluster_id], fill=False, linestyle='--', linewidth=2)
    plt.gca().add_patch(circle)

plt.title('Visualización de Clusters de Noticias')
plt.legend()
plt.grid(True)

plt.savefig(f'C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\public\\images\\scatter_clusters_{id_usuario}.png')

print(f'scatter_clusters_{id_usuario}.png')