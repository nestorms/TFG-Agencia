import sys
import json
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.svm import LinearSVC
from sklearn.neighbors import KNeighborsClassifier

import joblib


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

# Recorro todas las noticias y almaceno sus datos en el array
for noticia in noticias:
    datos_noticia = ' '.join([noticia['titulo'], noticia['descripcion'], noticia['contenido']])
    datos_noticias.append(datos_noticia)
    datos_categorias.append(noticia['categoria']['id'])


# Vectorización del texto
vectorizer = TfidfVectorizer()

#Clasificador Naive-bayes paa varias clases
clf = LinearSVC()

#Vectorizo los datos de entrenamiento (todas las noticias)
X_train_vectorized = vectorizer.fit_transform(datos_noticias)

# Entreno el modelo Naive-Bayes
clf.fit(X_train_vectorized, datos_categorias)


# Ruta absoluta a los archivos que debemos guardar 
ruta_modelo = "C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\resources\\py\\clasificador_entrenado.pkl"
ruta_vector = "C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\resources\\py\\vectorizer.pkl"

# Guardar el clasificador entrenado y el vectorizador
joblib.dump(clf,ruta_modelo)
joblib.dump(vectorizer,ruta_vector)

print("CLASIFICADOR ENTRENADO CORRECTAMENTE")