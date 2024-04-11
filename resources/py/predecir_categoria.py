import sys
import joblib

#Obtengo el cuerpo de la noticia a clasificar
X_test = sys.argv[1:]

#Obtengo el vectorizador de la ruta con Joblib
ruta_vector = "C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\resources\\py\\vectorizer.pkl"
vectorizer=joblib.load(ruta_vector)

#Vectorizo con el mismo objeto los datos test para obtener la predicción
X_test_vectorized = vectorizer.transform(X_test)

#Obtengo el clasificador ya entrenado con la ruta
ruta_modelo = "C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\resources\\py\\clasificador_entrenado.pkl"
clf=joblib.load(ruta_modelo)

# Evaluar el modelo
y_pred = clf.predict(X_test_vectorized)

# Imprimir la predicción que será recogida por el controlador de Noticia
print(y_pred[0])
