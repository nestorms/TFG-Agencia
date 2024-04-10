import sys
import json

from sklearn.ensemble import RandomForestClassifier
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.pipeline import make_pipeline


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
class_weights ={
    1: 1,  # Peso de clase para la primera clase (no política)
    2: 1,  # Peso de clase para la segunda clase (otra clase)
    3: 1,  # Peso de clase para la tercera clase (política)
    4: 1,  # Peso de clase para la tercera clase (política)
    5: 0.2  # Peso de clase para la tercera clase (política)
}
# Crear el vectorizador de términos y el clasificador Random Forest
vectorizer = CountVectorizer()
clf = RandomForestClassifier(n_estimators=100,class_weight=class_weights, random_state=42)

# Construir el pipeline
pipeline = make_pipeline(vectorizer, clf)
# Entrenar el modelo
pipeline.fit(datos_noticias, datos_categorias)


# Evaluar el modelo
y_pred = pipeline.predict(X_test)

# Imprimir reporte de clasificación
print(y_pred[0])

