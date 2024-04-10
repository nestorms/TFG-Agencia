import sys
import json

from sklearn.ensemble import RandomForestClassifier
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.pipeline import make_pipeline
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB


# Obtener la ruta al archivo temporal de las noticias en formato JSON
ruta_archivo_temporal = sys.argv[1]
X_test = sys.argv[2:]

# Leer las noticias del archivo temporal en formato JSON
with open(ruta_archivo_temporal, 'r') as archivo:
    noticias_json = archivo.read()

# Decodificar los datos JSON en una lista de Python
noticias = json.loads(noticias_json)['noticias']

# Crear un array para almacenar los datos de las noticias
datos_noticias = []
datos_categorias = []

# Recorrer todas las noticias y almacenar sus datos en el array
for noticia in noticias:
    datos_noticia = ' '.join([noticia['titulo'], noticia['descripcion'], noticia['contenido']])
    datos_noticias.append(datos_noticia)
    datos_categorias.append(noticia['categoria']['id'])


# Dividir los datos en conjuntos de entrenamiento y prueba (NO HACE FALTA EN ESTE CASO)
#X_train, X_test, y_train, y_test = train_test_split(datos_noticias, datos_categorias, test_size=0.01, random_state=42)

# Vectorización del texto
#vectorizer = CountVectorizer()
vectorizer = TfidfVectorizer()
#clf = RandomForestClassifier(n_estimators=100, random_state=42)
clf = MultinomialNB()


X_train_vectorized = vectorizer.fit_transform(datos_noticias)
X_test_vectorized = vectorizer.transform(X_test)

# Entrenar el modelo
clf.fit(X_train_vectorized, datos_categorias)

# Evaluar el modelo
y_pred = clf.predict(X_test_vectorized)

# Imprimir reporte de clasificación
print(y_pred[0])
print(X_test_vectorized.shape)


