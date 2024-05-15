import sys
import json
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.naive_bayes import MultinomialNB
from sklearn.linear_model import LogisticRegression
from sklearn.ensemble import RandomForestClassifier, GradientBoostingClassifier
from sklearn.svm import LinearSVC
from sklearn.neural_network import MLPClassifier
from sklearn.metrics import accuracy_score, f1_score, precision_score, recall_score, classification_report

# Obtengo la ruta al archivo temporal de las noticias en formato JSON
ruta_archivo_temporal = sys.argv[1]

# Leo las noticias del archivo temporal en formato JSON
with open(ruta_archivo_temporal, 'r') as archivo:
    noticias_json = archivo.read()
noticias = json.loads(noticias_json)['noticias']

# Creo un array para almacenar los datos de las noticias y sus clases
datos_noticias = []
datos_categorias = []

# Recorro todas las noticias y almaceno sus datos en el array
for noticia in noticias:
    datos_noticia = ' '.join([noticia['titulo'], noticia['descripcion'], noticia['contenido']])
    datos_noticias.append(datos_noticia)
    datos_categorias.append(noticia['categoria']['id'])


# Vectorización del texto y etrenamiento con modelos
vectorizer = TfidfVectorizer()
X = vectorizer.fit_transform(datos_noticias)
y = np.array(datos_categorias)

# Divido los datos en conjuntos de entrenamiento y prueba
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Defino los clasificadores que vamos a comparar
clasificadores = {
    "Naive Bayes": MultinomialNB(),                             # Naive-Bayes
    "Logistic Regression": LogisticRegression(max_iter=1000),   # Regresión Lógica
    "SVM": LinearSVC(),                                         # Support Vector Machine
    "Random Forest": RandomForestClassifier(),                  # Random Forest
    "Gradient Boosting": GradientBoostingClassifier(),          # Gradient Boosting
    "Neural Network": MLPClassifier(max_iter=1000)              # Red neuronal MLP
}

#Entreno y predigo resultados para ver el accuracy, F1-score...
resultados = {}

# Abro el archivo para escribir los resultados
with open("C:\\Users\\Néstor Martínez Sáez\\Desktop\\UNIVERSIDAD\\TFG Agencia\\Proyecto\\agencia-noticias\\resources\\py\\comparativa_clasificadores.txt", "w") as archivo_resultados:
    for nombre, clf in clasificadores.items():
        clf.fit(X_train, y_train)
        y_pred = clf.predict(X_test)
        
        accuracy = accuracy_score(y_test, y_pred)
        f1 = f1_score(y_test, y_pred, average='weighted')
        precision = precision_score(y_test, y_pred, average='weighted')
        recall = recall_score(y_test, y_pred, average='weighted')
        
        resultados[nombre] = {
            'accuracy': accuracy,
            'f1_score': f1,
            'precision': precision,
            'recall': recall
        }
        
        archivo_resultados.write(f"Resultados para {nombre}:\n")
        archivo_resultados.write(f"Accuracy: {accuracy:.4f}\n")
        archivo_resultados.write(f"F1 Score: {f1:.4f}\n")
        archivo_resultados.write(f"Precision: {precision:.4f}\n")
        archivo_resultados.write(f"Recall: {recall:.4f}\n")
        archivo_resultados.write("\n")
        archivo_resultados.write("Reporte de Clasificación:\n")
        archivo_resultados.write(classification_report(y_test, y_pred))
        archivo_resultados.write("="*60 + "\n")
        archivo_resultados.write("\n")

    # Comparativa de resultados unidos
    archivo_resultados.write("Comparativa de Resultados:\n")
    for nombre, metrics in resultados.items():
        archivo_resultados.write(f"{nombre}:\n")
        for metric, value in metrics.items():
            archivo_resultados.write(f"  {metric}: {value:.4f}\n")
        archivo_resultados.write("\n")