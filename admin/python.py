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
num_items = 5

# Crear una matriz de covarianza positiva con correlaciones altas entre ítems
cor_matrix = np.full((num_items, num_items), 0.8)  # Correlaciones altas
np.fill_diagonal(cor_matrix, 1)  # Correlación perfecta consigo mismo

# Generar datos multivariados para el primer test (escala 1-5)
data_test = multivariate_normal(mean=np.full(num_items, 3), cov=cor_matrix, size=30)

# Escalar y redondear al rango [1, 4]
data_test = np.clip(np.rint(data_test), 1, 4).astype(int)
df_test = pd.DataFrame(data_test, columns=[f'Item_{i+1}' for i in range(num_items)])

# Generar datos para el restest con una correlación alta con el test
# Haremos que el restest esté muy correlacionado con el test
data_retest = data_test + np.random.normal(0, 0.3, size=data_test.shape)  # Añadir un pequeño ruido
data_retest = np.clip(np.rint(data_retest), 1, 4).astype(int)
df_retest = pd.DataFrame(data_retest, columns=[f'Item_{i+1}' for i in range(num_items)])

# Calcular el coeficiente de Pearson entre el test y el restest
pearson_corr = df_test.corrwith(df_retest).mean()

# Calcular el Alfa de Cronbach para ambos conjuntos de datos
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