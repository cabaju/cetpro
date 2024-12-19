import numpy as np
import pandas as pd
from numpy.random import multivariate_normal

# Definir la función cronbach_alpha
def cronbach_alpha(df):
    items = df.shape[1]
    variances = df.var(axis=0, ddof=1)
    total_variance = df.sum(axis=1).var(ddof=1)
    alpha = (items / (items - 1)) * (1 - variances.sum() / total_variance)
    return alpha

# Generar matriz de correlaciones con confiabilidad esperada
target_alpha = 0.85
num_items = 11

# Crear una matriz de covarianza positiva con correlaciones altas entre ítems
cor_matrix = np.full((num_items, num_items), 0.85)  # Correlaciones más altas para un alfa más alto
np.fill_diagonal(cor_matrix, 1)  # Correlación perfecta consigo mismo

# Generar datos multivariados para el primer test (escala 1-4)
data_test = multivariate_normal(mean=np.full(num_items, 3), cov=cor_matrix, size=30)

# Escalar y redondear al rango [1, 4]
data_test = np.clip(np.rint(data_test), 1, 4).astype(int)
df_test = pd.DataFrame(data_test, columns=[f'Item_{i+1}' for i in range(num_items)])

# Ajustar el ruido para el restest y generar los datos correlacionados
# Asegurarse de que el coeficiente de Pearson esté entre 0.7 y 0.8
noise_factor = 0.2  # Ajuste del ruido para controlar la correlación
data_retest = data_test + np.random.normal(0, noise_factor, size=data_test.shape)  # Añadir un pequeño ruido
data_retest = np.clip(np.rint(data_retest), 1, 4).astype(int)
df_retest = pd.DataFrame(data_retest, columns=[f'Item_{i+1}' for i in range(num_items)])

# Calcular el coeficiente de Pearson entre el test y el restest
pearson_corr = df_test.corrwith(df_retest).mean()

# Calcular el Alfa de Cronbach para ambos conjuntos de datos
alpha_test = cronbach_alpha(df_test)
alpha_retest = cronbach_alpha(df_retest)

# Verificar si los coeficientes están dentro de los rangos deseados
while not (0.7 <= pearson_corr <= 0.8) or not (0.8 <= alpha_test <= 0.9) or not (0.8 <= alpha_retest <= 0.9):
    # Reajustar el ruido si los coeficientes no están en los rangos deseados
    noise_factor += 0.05  # Aumentar el ruido para modificar la correlación
    data_retest = data_test + np.random.normal(0, noise_factor, size=data_test.shape)  # Añadir más ruido
    data_retest = np.clip(np.rint(data_retest), 1, 4).astype(int)
    df_retest = pd.DataFrame(data_retest, columns=[f'Item_{i+1}' for i in range(num_items)])
    pearson_corr = df_test.corrwith(df_retest).mean()
    alpha_test = cronbach_alpha(df_test)
    alpha_retest = cronbach_alpha(df_retest)

# Imprimir los resultados
print(f"Alfa de Cronbach para el test: {alpha_test:.4f}")
print(f"Alfa de Cronbach para el restest: {alpha_retest:.4f}")
print(f"Coeficiente de Pearson promedio entre test y restest: {pearson_corr:.4f}")
print("\nDatos del test (escala 1-4):")
print(df_test)
print("\nDatos del restest (escala 1-4):")
print(df_retest)